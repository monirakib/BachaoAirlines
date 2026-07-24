<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Flight;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::where('user_type', '!=', 'Admin')->count(),
            'total_flights' => Flight::count(),
            'total_bookings' => Transaction::count(),
            'base_revenue' => Transaction::sum('amount'),
            'insurance_revenue' => Transaction::sum('insurance_amount'),
            'total_revenue' => Transaction::sum('total_amount'),
            'recent_flights' => Flight::orderByDesc('Flight_ID')->take(5)->get(),
            'recent_users' => User::where('user_type', '!=', 'Admin')
                ->orderByDesc('user_id')
                ->take(5)
                ->get(),
            'recent_bookings' => Transaction::with(['user', 'flight'])
                ->latest()
                ->take(5)
                ->get()
        ];

        return view('admin.dashboard', compact('stats'));
    }

    // ----- Flights -----

    public function flights()
    {
        $flights = Flight::orderByDesc('Flight_ID')->get();
        return view('admin.flights.index', compact('flights'));
    }

    public function storeFlight(Request $request)
    {
        $validated = $request->validate([
            'flight_id' => 'required|string|max:10|unique:flights,Flight_ID',
            'from' => 'required|string|max:10',
            'to' => 'required|string|max:10',
            'start_date' => 'required|date',
            'land_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'duration' => 'required|string|max:20',
            'price' => 'required|integer|min:0',
        ]);

        Flight::create([
            'Flight_ID' => $validated['flight_id'],
            'Flight_from' => $validated['from'],
            'Flight_to' => $validated['to'],
            'Start_date' => $validated['start_date'],
            'Land_date' => $validated['land_date'],
            'Start_time' => $validated['start_time'],
            'End_time' => $validated['end_time'],
            'Duration' => $validated['duration'],
            'Type' => 'Non-stop',
            'Price' => $validated['price'],
        ]);

        return redirect()->route('admin.flights')->with('success', 'Flight added successfully!');
    }

    public function editFlight(Flight $flight)
    {
        return view('admin.flights.edit', compact('flight'));
    }

    public function updateFlight(Request $request, Flight $flight)
    {
        $validated = $request->validate([
            'from' => 'required|string|max:10',
            'to' => 'required|string|max:10',
            'start_date' => 'required|date',
            'land_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'duration' => 'required|string|max:20',
            'price' => 'required|integer|min:0',
        ]);

        $flight->update([
            'Flight_from' => $validated['from'],
            'Flight_to' => $validated['to'],
            'Start_date' => $validated['start_date'],
            'Land_date' => $validated['land_date'],
            'Start_time' => $validated['start_time'],
            'End_time' => $validated['end_time'],
            'Duration' => $validated['duration'],
            'Price' => $validated['price'],
        ]);

        return redirect()->route('admin.flights')->with('success', 'Flight updated successfully!');
    }

    public function destroyFlight(Flight $flight)
    {
        $flight->delete();

        return redirect()->route('admin.flights')->with('success', 'Flight deleted successfully!');
    }

    // ----- Users -----

    public function users()
    {
        $users = User::orderByRaw("user_type = 'Admin' DESC")->orderByDesc('user_id')->get();
        return view('admin.users.index', compact('users'));
    }

    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:users,email,' . $user->user_id . ',user_id',
            'phone' => 'required|string|max:20',
            'user_type' => 'required|in:Customer,Admin',
        ]);

        // Cannot change your own user type
        if ($user->user_id === Auth::id()) {
            $validated['user_type'] = $user->user_type;
        }

        $user->update($validated);

        return redirect()->route('admin.users')->with('success', 'User updated successfully!');
    }

    public function destroyUser(User $user)
    {
        if ($user->user_type === 'Admin') {
            return redirect()->route('admin.users')->with('error', 'Cannot delete Admin users');
        }

        if ($user->user_id === Auth::id()) {
            return redirect()->route('admin.users')->with('error', 'Cannot delete your own account');
        }

        DB::transaction(function () use ($user) {
            Transaction::where('user_id', $user->user_id)->delete();
            $user->delete();
        });

        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }

    // ----- Bookings -----

    public function bookings()
    {
        $bookings = Transaction::with(['user', 'flight'])->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function showBooking(Transaction $booking)
    {
        $booking->load(['user', 'flight']);
        return view('admin.bookings.show', compact('booking'));
    }

    public function cancelBooking(Transaction $booking)
    {
        $bookingId = $booking->id;
        $booking->delete();

        return redirect()->route('admin.bookings')->with('success', "Booking #{$bookingId} cancelled successfully");
    }
}
