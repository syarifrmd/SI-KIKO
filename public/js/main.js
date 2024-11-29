const inputs = document.querySelectorAll(".input");


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});
document.querySelector('select[name="role"]').addEventListener('focus', function() {
    this.querySelector('option[disabled]').style.display = 'none';
});

document.querySelector('select[name="role"]').addEventListener('blur', function() {
    if (!this.value) {
        this.querySelector('option[disabled]').style.display = 'block';
    }
});
