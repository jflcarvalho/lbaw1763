@verbatim
<div id="answer-{{id}}" class="card my-3 answer {{# correct}}border-success{{/ correct}} {{#banned}}banned{{/banned}}">
    <div class="row mx-0">
        {{^is_authenticated}}
        <div class="col-1 d-flex flex-column align-items-start">
            <div class="p-2 mt-3 mb-auto">
                <i class="fas fa-trophy"></i>
                <p class="text-center mb-0 w-100 sort_score score">{{score}}</p>
            </div>
        </div>
        <div class="col-11">
            <div class="card-body">
                <p class="card-text">
                    {{#markdown}}{{content.version}}{{/markdown}}

                    {{#was_edited}}
                        <span class="badge badge-light float-right mr-2 mt-3">Edited</span>
                    {{/was_edited}}
                </p>
            </div>
            <div class="card-footer bg-transparent d-flex justify-content-between">
                <p class="card-text mb-0">
                    <small class="text-muted">Created by - </small>
                </p>
                <div class="mr-auto">
                    <a href="/users/{{author}}">{{author}}</a>
                    <span class="badge badge-success">{{author_badge}}</span>
                </div>
                <div class="text-center m-auto">
                    {{#hasComments}}
                    <a class="show-comments" role="button" data-toggle="collapse" href="#MessageComments{{id}}"
                    aria-expanded="false" aria-controls="MessageComments{{id}}" data-message-id="{{id}}">
                        Show Comments
                    </a>
                    {{/hasComments}}
                </div>
                <div class="ml-auto">
                    <p class="text-right mb-0">{{num_comments}} comments</p>
                </div>
            </div>
        </div>
        {{/is_authenticated}}

        {{#is_authenticated}}
        <div class="col-2 col-sm-1 py-3 d-flex flex-column align-items-center justify-content-between">
            <div class="p-2">
                <i class="fas fa-trophy"></i>
                <p class="text-center mb-0 w-100 sort_score {{^is_owner}}score{{/is_owner}}">{{score}}</p>
            </div>
            {{^is_owner}}
            <div class="d-flex flex-column justify-content-around {{^is_question_owner}}mb-sm-n-100{{/is_question_owner}}">
                <i class="vote fas fa-arrow-up {{discrete_p}}" data-positive="true" data-message_id="{{id}}"></i>
                <i class="vote fas fa-arrow-down {{discrete_n}}" data-positive="false" data-message_id="{{id}}"></i>
            </div>
            {{/is_owner}}
        </div>
        <div class="col-10 col-sm-11 pl-0 pl-sm-3 ">
            <div class="card-body p-1 p-sm-4">
                {{#is_mod}}<span class="card-text answer-content" data-message-id="{{id}}">{{/is_mod}}
                {{#is_owner}}{{^is_mod}}<span class="card-text answer-content" data-message-id="{{id}}">{{/is_mod}}{{/is_owner}}
                {{^is_owner}}{{^is_mod}}<span class="card-text">{{/is_mod}}{{/is_owner}}

                    <span class="answer-hidden-markdown">{{content.version}}</span>
                    {{#markdown}}{{content.version}}{{/markdown}}

                    {{#was_edited}}
                        <span class="badge badge-light float-right mr-2 mt-1">Edited</span>
                    {{/was_edited}}
                </span>
            </div>
        </div>
    </div>
    <div class="row mx-0">
        {{#is_question_owner}}
        <div class="col-1 mt-2">
            <button type="button" class="btn btn-outline-success ml-1 mark {{# correct}}marked{{/ correct}}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Mark answer as correct" data-message_id="{{id}}">
                <i class="fas fa-check"></i>
            </button>
        </div>
        {{/is_question_owner}}
        <div class="col-11 ml-auto">
            <div class="card-footer bg-transparent d-flex align-items-baseline justify-content-between">
                <div class="text-center">
                    <small class="text-muted">Created by - </small>
                    <a href="/users/{{author}}">{{author}}</a>
                    <span class="badge badge-success">{{author_badge}}</span>
                </div>
                <div class="text-center m-auto">
                    <a class="show-comments" role="button" data-toggle="collapse" href="#MessageComments{{id}}" aria-expanded="false" aria-controls="MessageComments{{id}}" data-message-id="{{id}}">
                        {{#hasComments}}
                        Show Comments
                        {{/hasComments}}

                        {{^hasComments}}
                        Add Comment
                        {{/hasComments}}
                    </a>
                </div>
                <small class="ml-auto mr-1 text-center mt-auto mb-auto">
                    {{#is_owner}}
                    <button class="btn btn-link discrete" data-toggle="modal" href="#editAnswerModal" data-message-id='{{id}}'>
                        <i class="fas fa-pencil-alt" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                    </button>
                    <button class="btn btn-link discrete" data-toggle="modal" href="#deleteAnswerModal" data-message-id='{{id}}'>
                        <i class="far fa-trash-alt" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
                    </button>
                    {{/is_owner}}

                    {{^is_owner}}
                        {{#is_mod}}
                        <button class="btn btn-link discrete" data-toggle="modal" href="#editAnswerModal" data-message-id='{{id}}'>
                            <i class="fas fa-pencil-alt" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                        </button>
                        <button class="btn btn-link discrete" data-toggle="modal" href="#deleteAnswerModal" data-message-id='{{id}}'>
                            <i class="far fa-trash-alt" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
                        </button>
                        {{/is_mod}}
                    <button class="btn btn-link report {{discrete_r}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Report" data-message_id='{{id}}'>
                        <i class="fas fa-exclamation-triangle"></i>
                    </button>
                    {{/is_owner}}
                </small>
            </div>
        </div>
        {{/is_authenticated}}

        <!-- COMMENTS -->
        <div class="collapse message-comments w-100" id="MessageComments{{id}}" data-message-id="{{id}}">
        {{#is_authenticated}}
            <div class="comment-creator card-footer comments-card px-0 px-sm-4 comment">
                <div class="d-flex list-group list-group-flush">
                    <div class="list-group-item bg-transparent">
                        <div class="input-group mt-3">
                            <input class="form-control new-comment-content" placeholder="New Comment" aria-label="New Comment" type="text" data-message-id="{{id}}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success new-comment-submit" type="button" data-message-id="{{id}}">Add Comment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{/is_authenticated}}
        </div>
    </div>
</div>
@endverbatim
