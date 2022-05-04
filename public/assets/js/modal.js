$(document).ready(function(){
	$('#view_post').click(function(){
		var id= $('#view_post_id').val();

		alert(id);

		if (id != '') {
			$.ajax({
				url:"?action=viewPost",
				method:"POST",
				data:{id:id},
				dataType:"JSON",

				success:function(data){
					$('#modal-title').text(data.titlePost);
					$('#modal-image').src(data.imagePost);
					$('#modal-content').text(data.contentPost);
				}
			})
		} else {
			alert('Aucun post présent');
		}
	});
});