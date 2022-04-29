var quill = new Quill('#editor', {
	placeholder: 'Écrivez votre article.',
	theme: 'snow'
});

let editor = document.getElementById('editor');

let button = document.getElementById('soumission');
let text = document.getElementById('contentPost');

button.addEventListener('click',function() {
	if (editor.children[0].innerHTML.replace(/(<([^>]+)>)/ig, "").length == 0) {
		document.getElementById('invalid-feedback').style.display = 'block';
		editor.style.border = '1px solid red';
		editor.style.borderRadius = '0';
		editor.classList.add('form-control');
		editor.classList.add('is-invalid');
	} else {
		text.value = editor.children[0].innerHTML;
	}
});