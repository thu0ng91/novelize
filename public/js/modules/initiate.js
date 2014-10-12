$(document).ready(function(){


	var area = document.getElementById('js-countable');

  var words = document.getElementById("word-count");

	Countable.live(area, function(counter) {

		words.innerText = counter.words

	}, { stripTags: true });

});