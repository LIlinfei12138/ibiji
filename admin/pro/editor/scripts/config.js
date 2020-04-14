(function() {
	$(function() {
		var editor, mobileToolbar, toolbar;
		toolbar = ['title', 'bold', 'italic', 'underline', 'strikethrough', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link', 'hr', '|', 'indent', 'outdent', 'emoji'];

		return editor = new Simditor({
		textarea: $('#editor'),
		placeholder: '前端baby专用^_^...',
		toolbar: toolbar,
		pasteImage: false,
		emoji: {
				imagePath: 'http://localhost/pro/editor/images/emoji/'
			}
		});
	});
}).call(this);
