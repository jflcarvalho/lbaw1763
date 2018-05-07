var Mustache = require('mustache');

function createAnswer(answer_info) {

    let template = document.querySelector("template.answer").innerHTML;
    let placeholder = document.createElement("span");

    answer_info.hasComments = (answer_info.answer.num_comments > 0? true : false);

    placeholder.innerHTML = Mustache.render(template, answer_info);

    let answers = document.getElementById("answers-container");
    answers.appendChild(placeholder.firstElementChild);
}

function getAnswersURL() {
    return window.location.pathname + '/answers';
}

function jumpToElement(elementID) {
    let element = document.getElementById(elementID);

    //Getting Y and Height of target element
    let top = element.offsetTop;
    let height = element.offsetHeight;

    //Go there with a smooth transition
    let pos = window.screenY;
    let finalPos = top + height;

    let int = setInterval(function() {
      window.scrollTo(0, pos);
      
      pos += (finalPos - pos) / 15;

      if (pos >= finalPos)
        clearInterval(int);

    }, 20);
}

module.exports = {
    createAnswer,
    getAnswersURL,
    jumpToElement
};