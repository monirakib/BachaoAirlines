<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Flight::query();
        
        if ($request->filled(['source', 'destination'])) {
            $query->where('Flight_from', $request->source)
                  ->where('Flight_to', $request->destination);
        }

        $flights = $query->get();
        $sources = Flight::distinct()->pluck('Flight_from');
        $destinations = Flight::distinct()->pluck('Flight_to');

        return view('dashboard', compact('flights', 'sources', 'destinations'));
    }

    public function travelInsurance()
    {
        return view('travel-insurance');
    }

    public function promo()
    {
        $promotions = $this->promoCodes();

        return view('promo', compact('promotions'));
    }

    public function promoDetails($code)
    {
        $promo = $this->promoCodes()[strtoupper($code)] ?? null;

        return view('promo-details', ['promoCode' => strtoupper($code), 'promo' => $promo]);
    }

    private function promoCodes()
    {
        return [
            'BKASH20' => [
                'category' => 'Payment Partner',
                'title' => '20% Off with bKash',
                'description' => 'Save up to 2000৳ on domestic flights',
                'image' => 'bkashs.jpg',
                'terms' => [
                    'Offer valid until December 31, 2024',
                    'Maximum discount of 2000৳ per transaction',
                    'Valid only for domestic flights',
                    'Must pay using bKash to avail the offer',
                ],
            ],
            'NAGAD15' => [
                'category' => 'Payment Partner',
                'title' => '15% Off with Nagad',
                'description' => 'Save up to 1500৳ on all flights',
                'image' => 'Nagads.jpg',
                'terms' => [
                    'Must pay using Nagad wallet',
                    'Maximum discount of 2000৳',
                    'Valid till December 2024',
                    'Minimum fare 5000৳',
                ],
            ],
            'STUDENT10' => [
                'category' => 'Student Special',
                'title' => '10% Student Discount',
                'description' => 'Valid student ID required',
                'image' => 'studentts.jpg',
                'terms' => [
                    'Valid student ID required at check-in',
                    'Maximum discount of 3000৳',
                    'One booking per student ID',
                    'Not combinable with other offers',
                ],
            ],
            'FAMILY25' => [
                'category' => 'Family Package',
                'title' => '25% Off Family Bookings',
                'description' => 'For 4+ passengers',
                'image' => 'family.jpg',
                'terms' => [
                    'Minimum 4 passengers required',
                    'Maximum discount of 10000৳',
                    'Valid on same flight booking',
                    'Must be immediate family members',
                ],
            ],
            'SUMMER30' => [
                'category' => 'Seasonal',
                'title' => '30% Summer Special',
                'description' => 'Hot deals for summer travel',
                'image' => 'summer.jpg',
                'terms' => [
                    'Valid from May to July 2024',
                    'Maximum discount of 5000৳',
                    'Valid on all routes',
                    'Blackout dates apply during Eid',
                ],
            ],
            'FIRST40' => [
                'category' => 'New Customer',
                'title' => '40% First Flight Discount',
                'description' => 'For first-time flyers',
                'image' => 'First40.jpg',
                'terms' => [
                    'First-time booking on Bachao Airlines only',
                    'Maximum discount of 4000৳',
                    'Valid on domestic flights',
                    'Must create account to avail',
                ],
            ],
            'MASTER35' => [
                'category' => 'Payment Partner',
                'title' => '35% Off with MasterCard',
                'description' => 'Exclusive discount for MasterCard holders',
                'image' => 'mastercard.jpg',
                'terms' => [
                    'Valid on MasterCard credit/debit cards only',
                    'Maximum discount of 5000৳',
                    'Valid till December 31, 2024',
                    'Not applicable on promotional fares',
                ],
            ],
            'GP25' => [
                'category' => 'Telecom Partner',
                'title' => '25% Off for GP STAR',
                'description' => 'Special discount for GP STAR members',
                'image' => 'gps.jpg',
                'terms' => [
                    'Valid GP STAR membership required',
                    'Maximum discount of 3000৳',
                    'One booking per GP number per month',
                    'Valid on domestic routes only',
                ],
            ],
            'ROBI20' => [
                'category' => 'Telecom Partner',
                'title' => '20% Off for Robi Users',
                'description' => 'Exclusive for Robi subscribers',
                'image' => 'robi.jpg',
                'terms' => [
                    'Valid Robi number verification required',
                    'Maximum discount of 2500৳',
                    'Valid on all routes',
                    'Cannot be combined with other offers',
                ],
            ],
            'UNI15' => [
                'category' => 'Brand Partner',
                'title' => '15% Off with Unilever',
                'description' => 'For Unilever product purchasers',
                'image' => 'uniliver.jpg',
                'terms' => [
                    'Must show Unilever product purchase receipt',
                    'Maximum discount of 2000৳',
                    'Valid for 30 days from purchase',
                    'Subject to seat availability',
                ],
            ],
            'PRAN25' => [
                'category' => 'Brand Partner',
                'title' => '25% Off PRAN Special',
                'description' => 'Exclusive offer for PRAN customers',
                'image' => 'pran.jpg',
                'terms' => [
                    'Must present PRAN product purchase receipt of min 1000৳',
                    'Maximum discount of 3000৳',
                    'Valid for domestic flights only',
                    'Receipt must be within last 7 days',
                ],
            ],
            'CITY30' => [
                'category' => 'Banking Partner',
                'title' => '30% Off with City Bank',
                'description' => 'For City Bank card holders',
                'image' => 'City-Bank.jpg',
                'terms' => [
                    'Valid only on City Bank cards',
                    'Maximum discount of 6000৳',
                    'Valid for international flights',
                    'Weekend surcharge may apply',
                ],
            ],
            'DBBL20' => [
                'category' => 'Banking Partner',
                'title' => '20% Off with DBBL',
                'description' => 'Special offer for DBBL customers',
                'image' => 'dbbl.jpg',
                'terms' => [
                    'Valid on DBBL credit/debit cards',
                    'Maximum discount of 4000৳',
                    'Valid till June 30, 2024',
                    'Minimum transaction amount 10000৳',
                ],
            ],
            'PATHAO15' => [
                'category' => 'Ride Sharing Partner',
                'title' => '15% Off with Pathao',
                'description' => 'Special discount for Pathao users',
                'image' => 'pathao.jpg',
                'terms' => [
                    'Must show Pathao platinum membership',
                    'Maximum discount of 2500৳',
                    'Valid on domestic routes',
                    'One booking per Pathao account',
                ],
            ],
        ];
    }

    public function recommend()
    {
        return view('recommend');
    }
}