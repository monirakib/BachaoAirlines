<?php

namespace App\Services;

class MembershipService
{
    /**
     * Determine the membership level for a given point total.
     */
    public static function calculateMembershipLevel(int $rewardPoints): string
    {
        if ($rewardPoints >= 1001) {
            return 'Gold';
        } elseif ($rewardPoints >= 501) {
            return 'Silver';
        }

        return 'Bronze';
    }

    /**
     * Membership only ever moves up, never down, even if points drop.
     */
    public static function nextLevel(int $rewardPoints, string $currentLevel): string
    {
        $ranks = ['Bronze' => 1, 'Silver' => 2, 'Gold' => 3];
        $candidate = self::calculateMembershipLevel($rewardPoints);

        if ($ranks[$candidate] > ($ranks[$currentLevel] ?? 0)) {
            return $candidate;
        }

        return $currentLevel;
    }
}
