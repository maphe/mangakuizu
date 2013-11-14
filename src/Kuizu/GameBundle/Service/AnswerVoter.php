<?php

namespace Kuizu\GameBundle\Service;

use Kuizu\GameBundle\Entity\Question;

class AnswerVoter
{
    const NOTE_PERFECT = 1;

    /** @var array */
    protected $scores = [];

    public function evaluate(Question $question, array $answers)
    {
        $scores = $this->calculateAllScores($question, $answers);
        $best   = $this->discriminateBestAnswers($scores);

        return ['global' => array_product($best), 'details' => $best];
    }

    public function isCorrect($result)
    {
        return $result['global'] === self::NOTE_PERFECT;
    }

    protected function calculateAllScores(Question $question, array $answers)
    {
        $scores = [];
        foreach ($question->getAnswers() as $rightAnswer) {
            foreach ($answers as $givenAnswer) {
                $scores[$rightAnswer->getWording()][$givenAnswer] =
                    $this->rate($rightAnswer->getWording(), $givenAnswer);
            }
        }
        return $scores;
    }

    protected function discriminateBestAnswers(array $scores)
    {
        $best = [];
        foreach($scores as $answer => $rates) {
            foreach ($rates as $rate) {
                if (!isset($best[$answer]) || $best[$answer] < $rate) {
                    $best[$answer] = $rate;
                }
            }
        }
        return $best;
    }

    protected function rate($atempted, $given)
    {
        $atempted = strtolower(trim($atempted));
        $given = strtolower(trim($given));
        return 1 - levenshtein($atempted, $given) / max(strlen($atempted), strlen($given));
    }
}