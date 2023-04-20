$( document ).ready(function() {
    $(document).on('click','.add_user', function(e){
        e.preventDefault();
        let name = $('#name').val();
        let age = $('#age').val();
        $.ajax({
            url:"/store",
            method:'post',
            data:{name:name,age:age},
            success:function(res){
                if(res.status=='success'){
                    $('#addModal').modal('hide');
                    $('#addUserForm')[0].reset();
                    $('.table').load(location.href+'. table');
                }
            },
        });
    });
    $(document).on('click','.update_user_form', function(e){
        e.preventDefault();
        let id = $(this).data('id');
        let name = $(this).data('name');
        let age = $(this).data('age');
        $('#update_id').val(id);
        $('#update_name').val(name);
        $('#update_age').val(age);
    });

    $(document).on('click','.update_user', function(e){
        e.preventDefault();
        let update_id = $('#update_id').val();
        let update_name = $('#update_name').val();
        let update_age =  $('#update_age').val();
        $.ajax({
            url:"/update",
            method:'post',
            data:{update_id:update_id,update_name:update_name,update_age:update_age},
            success:function(res){
                if(res.status=='success'){
                    $('#updateModal').modal('hide');
                    $('#updateUserForm')[0].reset();
                    $('.table').load(location.href+'. table');
                }
            },
        });
    });

    $(document).on('click', '.delete_user', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        if(confirm('Delete this user ?')){
            $.ajax({
                url:"/delete",
                method:'post',
                data:{id:id},
                success:function(res){
                    if(res.status=='success'){
                        $('.table').load(location.href+'. table');
                    }
                }
            });
        }
    });

    $(document).on('click', '#return_top', function() {
        $("html, body").animate({ scrollTop: 0 }, "fast");
        return false;
    });


    $(document).on('click', '#printPage', function() {
        window.print();
        return false;
    });

    var maxLength = 10;
    $(document).on('click', '#max_input', function() {
        var textlen = maxLength - $(this).val().length;
        $('#rchars').text(textlen);
    });

    $(document).on('click', '#create_div', function() {
        var div = "<div class='my-2' id='new_div'>New Division</div>";
        $(".new_area").append(div);
    });

    $(document).on('click', '#empty_div', function() {
        $(".new_area").empty()
    });

    $(document).on('click', '#css_div', function() {
        $('.new_area').css({"background-color": "red", "font-size": "20px", "color" : "white"});
    });

    $(document).on('click', '#toggle-button', function(){
        $('#toggle-text').toggle();
    });

    $(document).on('click', '#slide-button', function(){
        var isHidden = $("#slide-text").is(":hidden");
        if (isHidden) {
          $('#slide-text').slideDown();
        } else {
          $('#slide-text').slideUp();
        }
    });

    $(document).on('click', '#get-value-button', function(){
        alert("Value: " + $("#value-test").val());
    });

    $(document).on('click', '#change-value-button', function(){
        var randomValue = Math.floor(Math.random() * 101);
        $('#value-test').val(randomValue);
    });

    $(document).on('click','#append-button', function(){
        $("#text").append("<b>Appended text</b>. ");
    });

    $(document).on('click','#prepend-button', function(){
        $("#text").prepend("<b>Prepended text</b>. ");
    });
});
