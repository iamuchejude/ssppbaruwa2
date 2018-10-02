(function() {
	const modalBtn = document.querySelectorAll('[data-ctoggle]');

	modalBtn.forEach((el, index) => {
		el.addEventListener('click', e => {
			let $targetId = e.target.getAttribute('data-mid');
			let $view_url = `http://localhost/sspp/index.php/family/view_member/${$targetId}`;
			document.querySelector('#view_content').innerHTML = $view_url;
			$('#view_content').load($view_url, function(data, status){
				if(status == 'success') {
					console.log(status);
					console.log(data);
				} else {
					console.log(status);
					console.log("Failed: "+ data);
				}
			});
		});
	})

})();
