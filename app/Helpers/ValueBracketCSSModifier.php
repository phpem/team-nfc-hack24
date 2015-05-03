<?php namespace Teamnfc\Helpers;

class ValueBracketCSSModifier {

    public static function get($percentage) {
        /*
            Positive: x >= 65%
            Neutral: 65% > x >= 45%
            Borderline: 45% > x >= 30%
            Negative: 30% > x
         */
        if($percentage >= 65) {
            return 'positive';
        }
        if(65 > $percentage && $percentage >= 45) {
            return 'neutral';
        }

        if(45 > $percentage && $percentage >= 30) {
            return 'borderline';
        }

        return 'negative';
    }

    public static function getInverse($percentage) {

        if($percentage >= 65) {
            return 'negative';
        }
        if(65 > $percentage && $percentage >= 45) {
            return 'borderline';
        }

        if(45 > $percentage && $percentage >= 30) {
            return 'neutral';
        }

        return 'positive';
    }
}