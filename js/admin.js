

/**
 * sends a request to the specified url from a form. this will change the window location.
 * @param {string} path the path to send the post request to
 * @param {object} params the paramiters to add to the url
 * @param {string} [method=post] the method to use on the form
 */
function post(path, params, method='post') {
  const form = document.createElement('form');
  form.method = method;
  form.action = path;

  for (const key in params) {
    if (params.hasOwnProperty(key)) {
			console.log(params[key]);
      const hiddenField = document.createElement('input');
      hiddenField.type = 'hidden';
      hiddenField.name = key;
      hiddenField.value = params[key];

      form.appendChild(hiddenField);
    }
  }

  document.body.appendChild(form);
  form.submit();
}

function loadBlogContent() {
	var route = '/blog/posts';
	var xhr = new XMLHttpRequest();
  console.log(serverURL)
	xhr.open('GET', route, true);
  console.log(serverURL + route);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  var authToken = getCookie('PHPSESSID');

  if(!authToken) {
    return;
  }

  xhr.setRequestHeader('Authorization', 'Bearer ' + authToken);
	xhr.onload = function () {
      var responseText = this.responseText;
      if(!responseText) {
        return;
      }
      var responseJsonArr = JSON.parse(responseText);
      var i;
      for(i=0; i<responseJsonArr.length; i++) {
				console.log(responseJsonArr[i]);
        postHtml = responseJsonArr[i]['post_html'];
				uuid = responseJsonArr[i]['uuid'];
        renderPost(postHtml, uuid);
      }
	};
	xhr.send();
}

function renderPost(postHtml, uuid) {
	console.log("renderpost uuid = " + uuid);
  blogBodyElement = document.getElementById('blog-body-content');
  blogBodyElement.innerHTML = blogBodyElement.innerHTML + '<hr>' + postHtml;
	blogBodyElement.innerHTML += '<br> <br> <input id=delete_box_'+uuid+' type="checkbox">';
	blogBodyElement.innerHTML += '<br> <br> <button id=delete_btn_'+uuid+' onclick=deletePost("'+uuid+'")>Delete</button>';
}

function deletePost(uuid) {
	console.log("delete post uuid = " + uuid);
	checkbox = document.getElementById('delete_box_' + uuid);
	if(checkbox.checked) {

		csrfName = document.getElementById('csrf-token-name-elem').value;
		csrfValue = document.getElementById('csrf-token-value-elem').value;

		data = {
			'uuid' : uuid,
			'csrf_name' : csrfName,
			'csrf_value' : csrfValue
		}
		post('deletePost', data);
	}
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

var serverURL = 'localhost';

loadBlogContent()
