$(document).ready(function(){
	$('#view_post').click(function(){
		var id= $('#view_post_id').val();

		if (id != '') {
			$.ajax({
				url:"?action=viewPost&id=.id",
				method:"GET",
				data:{id:id},
				dataType:"JSON",
				timeout: 20000,

				success:function(data){
					$('#modal-title').html(data.titlePost);
					$('#modal-image').attr('src',data.imagePost);
					$('#modal-content').html(data.contentPost);
				}
			});
		} else {
			alert('Aucun post présent');
		}
	});
});