$(function() {

    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass('selected').html(fileName);
    });

    // Tembusan
    $('.tampilModalTambahTembusan').on('click', function() {
        $('#formModalLabel').html('Tambah Data Tembusan');
        $("#method").val("post")
        $("#no_surat").val("");
        $("#keterangan").val("");
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action',"/dashboard/tembusan");
    });

    $('.tampilModalUbahTembusan').on('click', function(){

        const id = $(this).data('id');     
        let CSRF_TOKEN = $(this).data('csrf');
        $("#method").val("put")
        $('#formModalLabel').html('Ubah Data Tembusan');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', "/dashboard/tembusan/" + id);    
                
        $.ajax({
            url: "http://127.0.0.1:8000/dashboard/getTembusan",
            data: {_token: CSRF_TOKEN, id : id},
            method: "post",
            dataType: 'json',
            success: function(data){                
                $("#no_surat").val(data[0].no_surat);
                $("#keterangan").val(data[0].keterangan);
            }
        });
    });

    // Role
    $('.tampilModalTambahRole').on('click', function() {
        $("#method").val("post")
        $('#formModalLabel').html('Tambah Data Role');
        $("#keterangan").val("");
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action', "/dashboard/role");
    });

    $('.tampilModalUbahRole').on('click', function(){

        const id = $(this).data('id');     
        let CSRF_TOKEN = $(this).data('csrf');
        $("#method").val("put")
        $('#formModalLabel').html('Ubah Data Role');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', "/dashboard/role/" + id);    
                
        $.ajax({
            url: "http://127.0.0.1:8000/dashboard/getRole",
            data: {_token: CSRF_TOKEN, id : id},
            method: "post",
            dataType: 'json',
            success: function(data){                                    
                $("#keterangan").val(data[0].keterangan);
            }
        })
    });

    // User
    $('.tampilModalTambahUser').on('click', function(){   
        $("#method").val("post") 
        $('#formModalLabel').html('Tambah User');
        $("#username").val("");
        $("#username").removeAttr('readonly');
        $("#password").val("");
        $("#password").removeAttr('readonly');
        $("#penempatan_id").val("");
        $("#role_id").val("");
        $("#is_active").attr('checked','')
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action', "/dashboard/user");
    });


    $('.tampilModalUbahUser').on('click', function(){

        const id = $(this).data('id');
        let CSRF_TOKEN = $(this).data('csrf');
        $("#method").val("put")
        $('#formModalLabel').html('Ubah User');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', "/dashboard/user/" + id);
            
                
        $.ajax({
            url: "http://127.0.0.1:8000/dashboard/getUser",
            data: {_token: CSRF_TOKEN, id : id},
            method: "post",
            dataType: 'json',
            success: function(data){  
                console.log(data);            
                $("#username").val(data[0].username);
                $("#username").attr('readonly','');
                // $("#password").val(data[0].password);
                $("#password").val("******");
                $("#password").attr('readonly','');
                $("#role_id").val(data[0].role_id);                
                $("#penempatan_id").val(data[0].penempatan_id);
                $("#is_active").val(data[0].is_active);
                if (data[0].is_active == 0) {
                    $("#is_active").removeAttr('checked')
                    $("#is_active").on('click', function() {
                        $("#is_active").val(1);
                    })                
                } else {
                    $("#is_active").attr('checked','')
                }            
            }
        })

    });

    // Role
    $('.tampilModalTambahPenempatan').on('click', function() {
        $("#method").val("post")
        $('#formModalLabel').html('Tambah Data Penempatan');
        $("#keterangan").val("");
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action', "/dashboard/penempatan");
    });

    $('.tampilModalUbahPenempatan').on('click', function(){

        const id = $(this).data('id');     
        let CSRF_TOKEN = $(this).data('csrf');
        $("#method").val("put")
        $('#formModalLabel').html('Ubah Data Penempatan');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', "/dashboard/penempatan/" + id);    
                
        $.ajax({
            url: "http://127.0.0.1:8000/dashboard/getPenempatan",
            data: {_token: CSRF_TOKEN, id : id},
            method: "post",
            dataType: 'json',
            success: function(data){                                    
                $("#keterangan").val(data[0].keterangan);
            }
        })
    });
})