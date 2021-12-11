

function loadBlogContent() {
	route = '/blog/posts';
	var xhr = new XMLHttpRequest();
  console.log(serverURL)
	xhr.open('GET', route, true);
  console.log(serverURL + route);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  authToken = getCookie('PHPSESSID');

  xhr.setRequestHeader('Authorization', 'Bearer ' + authToken);
	xhr.onload = function () {
    var responseText = this.responseText;
    var responseJsonArr = JSON.parse(responseText);
    var i;
    for(i=0; i<responseJsonArr.length; i++) {
      content = responseJsonArr[i]['content'];
      console.log(content);
      renderPost(content);
    }
	};
	xhr.send();
}

function renderPost(content, index) {
  blogBodyElement = document.getElementById('blog-body-content');
  blogBodyElement.innerHTML = blogBodyElement.innerHTML + '<hr>' + content;
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

loadBlogContent()