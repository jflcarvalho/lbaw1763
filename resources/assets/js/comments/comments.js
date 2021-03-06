var messages = require('../messages.js');
var commentsViewer = require('./viewComments.js');
var commentsCreator = require('./addComment.js');
var commentsEditor = require('./editComment.js');
var commentsRemover = require('./removeComment.js');

function addEventListeners() {

    viewCommentsEventListener();
    addCommentsEventListener();
    removeCommentsEventListener();

    // Some event listeners are only added when the respective
    // html elements triggering the events are created
}

function addSingleEventListeners(message_id) {
    viewSingleCommentEventListener(message_id);
    addSingleCommentEventListener(message_id);
}

function viewCommentsEventListener() {
    messages.genericClickListener('.show-comments', commentsViewer.viewAnswerComments);
}

function viewSingleCommentEventListener(message_id) {
    messages.genericSingleClickListener('.show-comments', commentsViewer.viewCommentsRequest, message_id);
}

function addCommentsEventListener() {
    messages.genericClickListener('.new-comment-submit', commentsCreator.addCommentRequest);
    messages.genericEnterListener('.new-comment-content', commentsCreator.addCommentRequest);
}

function addSingleCommentEventListener(message_id) {
    messages.genericSingleClickListener('.new-comment-submit', commentsCreator.addCommentRequest, message_id);
    messages.genericSingleEnterListener('.new-comment-content', commentsCreator.addCommentRequest, message_id);
}

function removeCommentsEventListener() {
    $('#deleteCommentModal').on('show.bs.modal', function (e) {
        commentsRemover.removeComment($(e.relatedTarget)[0]);
    });
}

function addQuestionCommentsListeners() {
    messages.genericClickListener('.show-question-comments', commentsViewer.viewQuestionComments);
}

window.addEventListener('load', addQuestionCommentsListeners);

module.exports = {
    addEventListeners
};
