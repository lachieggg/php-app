

function loadForumContent() {
	route = '/forum/posts';
	var xhr = new XMLHttpRequest();
  console.log(serverURL)
	xhr.open('GET', route, true);
  console.log(serverURL + route);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  authToken = getCookie('PHPSESSID');

  xhr.setRequestHeader('Authorization', 'Bearer ' + authToken);
	xhr.onload = function () {
      var responseText = this.responseText;
      console.log(responseText);
      var responseJsonArr = JSON.parse(responseText);
      console.log(responseJsonArr);
      var i;
      for(i=0; i<responseJsonArr.length; i++) {
        comment = responseJsonArr[i]['comment_text'];
        name = responseJsonArr[i]['name'];
        time = responseJsonArr[i]['created_at'];
        console.log(comment);
        renderPost(comment, time, name);
      }
	};
	xhr.send();
}

function renderPost(comment, time, name) {
  forumBodyElement = document.getElementById('primary-forum-body');
  forumBodyElement.innerHTML = forumBodyElement.innerHTML + '<hr>'
  forumBodyElement.innerHTML = forumBodyElement.innerHTML + "NAME = " + name + "<br>";
  forumBodyElement.innerHTML = forumBodyElement.innerHTML + "TIME = " + time + "<br>";
  forumBodyElement.innerHTML = forumBodyElement.innerHTML + "<b>" + comment + "</b>";
}

function getCookie(cookieName) {
  var name = cookieName + "=";
  var cookieArray = decodeURIComponent(document.cookie).split(';');

  for(var index = 0; index < cookieArray.length; index++) {
    var cookie = cookieArray[index];
    while (cookie.charAt(0) == ' ') {
      cookie = cookie.substring(1);
    }
    if (cookie.indexOf(name) == 0) {
      return cookie.substring(name.length, cookie.length);
    }
  }

  return "";
}

var serverURL = "localhost";

loadForumContent();