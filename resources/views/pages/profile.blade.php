@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<main class="container">
<div class="row">
    <section class="col-md-9 px-0 px-sm-3 mt-5">
        <div class="card mb-5">
            <img class="card-img-top" height="350px" src="<?=$user->getImage('background')?>" alt="Card image cap">
            <div class="card-body text-center pb-3">
                <div>
                    <img class="rounded-circle img-profile-big" src="<?=$user->getImage('profile')?>" alt="UserImage">
                </div>
                <h2 class="card-text my-3"><?=$user->username?></h2>
                <p><?=$user->biography != null ? $user->biography : 'Apparently, this user prefers to keep an air of mystery about them.'?></p>
            </div>
        </div>

        <!-- Activity Nav -->
        <div class="container py-3">
            <div class="pb-4">
                <h2>
                    My Activity
                </h2>
            </div>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-questions" role="tab" aria-controls="nav-questions"
                        aria-selected="true">Questions</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-answers" role="tab" aria-controls="nav-answers"
                        aria-selected="false">Answers</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-comments" role="tab" aria-controls="nav-comments"
                        aria-selected="false">Comments</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-marked" role="tab" aria-controls="nav-marked"
                        aria-selected="false">Marked Questions</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-questions" role="tabpanel" aria-labelledby="nav-questions-tab">
                    <!-- Questions -->
                    @each('partials.question', $user->getQuestions()->get(), 'question')
                </div>
                <div class="tab-pane fade" id="nav-answers" role="tabpanel" aria-labelledby="nav-answers-tab">
                    <!-- Answers -->
                    {{-- @each('partials.answer', $user->getAnswers()->get(), 'answer') --}}
                </div>
                <div class="tab-pane fade" id="nav-comments" role="tabpanel" aria-labelledby="nav-comments-tab">
                    <!-- Comments -->
                    {{-- @each('partials.comment', $user->getComments()->get(), 'comment') --}}
                </div>
                <div class="tab-pane fade" id="nav-marked" role="tabpanel" aria-labelledby="nav-marked-tab">
                    <!-- Marked Questions -->
                    @each('partials.question', $user->getBookmarks()->get(), 'question')
                </div>
            </div>
        </div>
    </section>

    <!-- Side Column -->
    <aside class="col-md-3 mb-5">
        <div class="pt-5">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-text my-2">Control Panel</h4>
                    <div class="d-flex flex-column justify-content-center">
                        <span class="badge badge-success">{{$user->getBadge()}}</span>
                    </div>
                    <div class="my-3">
                        <p>Reputation Points</p>
                        <i class="fas fa-trophy"></i>
                        <span>{{$user->reputation}}</span>
                    </div>
                    <div class="d-flex flex-column align-content-center container">
                        <div class="py-2">
                            <i class="far fa-question-circle"></i>
                            <span>{{$user->getNumberQuestions()}}</span>
                        </div>
                        <div class="py-2 border-top">
                            <i class="far fa-hand-peace"></i>
                            <span>{{$user->getNumberAnswers()}}</span>
                        </div>
                        <div class="py-2 border-top">
                            <i class="far fa-comment"></i>
                            <span>{{$user->getNumberComments()}}</span>
                        </div>
                    </div>
                    <div class="py-3">
                        <a href="{{ route('edit_profile', ['username' => $user->username]) }}" role="button" class="btn btn-primary w-80">
                            <span class="pr-1">
                                <i class="far fa-edit"></i>
                            </span>
                            Edit Profile
                        </a>
                    </div>
                    <div class="pb-2">
                        <a href="" role="button" class="btn btn-primary w-80">
                            <span class="pr-1">
                                <i class="fas fa-cog"></i>
                                </i>
                            </span>
                            Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</div>
</main>
@endsection
