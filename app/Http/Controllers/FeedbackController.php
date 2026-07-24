<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::latest()->take(5)->get();
        $faqs = [
            [
                'question' => 'What is the process for changing a reservation?',
                'answer' => 'To change a reservation, please visit our Manage Reservations page or call customer service.'
            ],
            [
                'question' => 'Can I cancel my ticket and get a refund?',
                'answer' => 'Yes, cancellations are allowed under certain conditions. Refunds depend on the ticket type.'
            ],
            [
                'question' => 'What should I do if I miss my flight?',
                'answer' => 'If you miss your flight, please contact customer service immediately for assistance with rebooking.'
            ],
            [
                'question' => 'How can I check the status of my flight?',
                'answer' => 'You can check the status of your flight on our website or by calling customer service.'
            ],
            [
                'question' => 'What are the baggage allowances for my flight?',
                'answer' => 'Please check our website or contact customer service for detailed baggage allowance information.'
            ],
            [
                'question' => 'How early should I arrive at the airport?',
                'answer' => 'We recommend arriving at least 2 hours before domestic flights and 3 hours before international flights.'
            ],
        ];

        return view('feedback.index', compact('feedbacks', 'faqs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'rating' => 'required|integer|between:1,5',
            'comments' => 'required|string|max:1000'
        ]);

        Feedback::create($validated);

        return redirect()->route('feedback')->with('success', 'Thank you for your feedback!');
    }
}