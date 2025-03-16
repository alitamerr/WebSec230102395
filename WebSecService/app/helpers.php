<?php

use App\Models\Grade;

if (!function_exists('calculateGPA')) {
    function calculateGPA($grades)
    {
        $totalCredits = 0;
        $totalPoints = 0;

        foreach ($grades as $grade) {
            $creditHours = $grade->credit_hours;
            $gradePoints = getGradePoints($grade->grade);
            $totalCredits += $creditHours;
            $totalPoints += $gradePoints * $creditHours;
        }

        return $totalCredits > 0 ? number_format($totalPoints / $totalCredits, 2) : "0.00";
    }
}

if (!function_exists('calculateCGPA')) {
    function calculateCGPA($groupedGrades)
    {
        $totalCredits = 0;
        $totalPoints = 0;

        foreach ($groupedGrades as $grades) {
            foreach ($grades as $grade) {
                $creditHours = $grade->credit_hours;
                $gradePoints = getGradePoints($grade->grade);
                $totalCredits += $creditHours;
                $totalPoints += $gradePoints * $creditHours;
            }
        }

        return $totalCredits > 0 ? number_format($totalPoints / $totalCredits, 2) : "0.00";
    }
}

if (!function_exists('getGradePoints')) {
    function getGradePoints($grade)
    {
        $gradeScale = [
            'A'  => 4.0, 'A-' => 3.7,
            'B+' => 3.3, 'B'  => 3.0, 'B-' => 2.7,
            'C+' => 2.3, 'C'  => 2.0, 'C-' => 1.7,
            'D+' => 1.3, 'D'  => 1.0, 'F'  => 0.0
        ];
        return $gradeScale[$grade] ?? 0.0;
    }
}

if (!function_exists('isPrime')) {
    function isPrime($number) {
        if ($number <= 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) {
                return false;
            }
        }
        return true;
    }
}
