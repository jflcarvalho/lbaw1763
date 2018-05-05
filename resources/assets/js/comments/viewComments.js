var ajax = require('../ajax.js');
var errors = require('../errors.js');

import { getCommentsURL } from './commentsUtils.js'
import { getCommentsDropDown } from './commentsUtils.js'
import { createComments } from './commentsUtils.js'
import { toggleShowMsg } from './commentsUtils.js'

export function viewCommentsRequest(message_id) {

    // If area already expanded, its only closing, so not worth making ajax request
    if (getCommentsDropDown(message_id).classList.contains('show')) {
        toggleShowMsg(message_id, true);
        return;
    }

    ajax.sendAjaxRequest(
        'get', getCommentsURL(message_id), {}, (data) => {
            getCommentsHandler(data.target, message_id);
        }
    );
}

// Handler to the get comments request response
function getCommentsHandler(response, message_id) {

    if (response.status == 200) {
        let responseJSON = JSON.parse(response.responseText);
        createComments(responseJSON, message_id);
    }
    else errors.displayError("Failed to retrieve the requested Comments");
}