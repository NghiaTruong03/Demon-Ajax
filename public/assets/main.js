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
});
