$('table[data-form="deleteForm"]').on('click', '.form-delete', function(e){
    e.preventDefault();
    var $form=$(this);
    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .on('click', '#delete-btn', function(){
            $form.submit();
        });
});

$(function () {
    $("#users").DataTable({
        "paging": false,
        "searching": false,
        "info": false,
        "columnDefs": [{
            "targets": 3,
            "orderable": false
        }]
    });
  });