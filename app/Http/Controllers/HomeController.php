<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Research;
use App\Vote;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $research;
    private $canVote;

    public function __construct()
    {
        $this->research = Research::where('status', 'active')->orderBy('created_at', 'desc')->first();

        if (isset($_COOKIE["AlreadyVoted"]) && $_COOKIE["AlreadyVoted"]) {
            $this->canVote = false;
        } else {
            $this->canVote = Vote::where('research_id', $this->research->id)->where('ip', \Request::ip())->count() == 0;
        }
    }

    public function home()
    {
        if (@$_SERVER['REQUEST_SCHEME'] == 'http')
        {
            return redirect('https://vozdoeleitor.com/');
        }

        return view('home')
            ->with('research', $this->research)
            ->with('canVote', $this->canVote);
    }

    public function register(Request $request)
    {
        if ($this->canVote) {
            $researchId = $this->research->id;

            $candidate = Candidate::where('research_id', $researchId)->where('number', $request->number)->first();

            $vote = new Vote();

            if (!$candidate) {
                $candidate = Candidate::where('research_id', $researchId)->where('number', -1)->first();
            }

            $vote->candidate_id = $candidate->id;
            $vote->research_id = $researchId;
            $vote->ip = \Request::ip();

            if ($vote->save()) {
                setcookie(
                    'AlreadyVoted',
                    'computed',
                    time() + (10 * 365 * 24 * 60 * 60)
                );

                return [
                    'success' => true,
                    'message' => 'Voto computado com sucesso!',
                ];
            }

            return [
                'success' => false,
                'message' => 'Ocorreu um erro ao salvar seu voto, tente novamente!',
            ];
        }

        return [
            'success' => false,
            'message' => 'Você já votou nessa enquate!',
        ];
    }

}
