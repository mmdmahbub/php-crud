<script>
  $(document).ready(function() {
      $('#update_section').click(function(e){
        e.preventDefault();
        var section_name      = $("#sections").val();
        var section_teacher   = $("#teacher").val();
        var section_id           = $("#section_id").val();
        var section_class       = $("#section_class").val();
        var section_shift        = $("#section_shift").val();

        $.ajax({
            type: "POST",
            url: "ajax/ajax_edit_section.php",
			cache: false,
            dataType: "JSON",
			beforeSend: function() {
				$('#loader').show();
			  },
			  complete: function(){
				 $('#loader').hide();
			  },

            data:{section_name:section_name,section_teacher:section_teacher,section_id:section_id,section_class:section_class,section_shift:section_shift},

            success : function(data){
                if (data.code == "200"){
					$(".error_msg>.alert").html("<ul class='nav'>"+data.msg+"</ul>");
					$(".error_msg").removeClass('bg_color4');
					$(".error_msg").addClass('bg_color2');
					$(".error_msg").removeClass('hide');
					$(".error_msg").addClass('show');

                    function load_data(page){
                		$.ajax({
                			url: 'ajax/ajax_load_sectioninfo.php',
                			method: 'POST',
            				cache: false,
            				beforeSend: function() {
            				$('.overlay').show();
            			  },
            			  complete: function(){
            				 $('.overlay').hide();
            			  },
                			data: {
                				page: page
                			},
                			success: function(res){
                				$('#display_data').html(res);
                			}
                		});
                	}

            		load_data();

                } else {

                    $(".error_msg>.alert").html("<ul class='nav'>"+data.msg+"</ul>");
					$(".error_msg").removeClass('bg_color2');
					$(".error_msg").addClass('bg_color4');
					$(".error_msg").removeClass('hide');
					$(".error_msg").addClass('show');

                }

            }

        });


      });

  });
</script>
