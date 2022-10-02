$(document).ready(function() {
    // $('#NewClient').on('click',function(e) {
    //     e.preventDefault();
    //     $('#tabClient').hide(500)
    //     $('#tabClient').show(500)
    // })

    $("#modifier").on('click',function() {
        $('input').prop('disabled',false)
        $('select').prop('disabled',false)
        $('textarea').prop('disabled',false)
        $('.ModifierClient').html('<input type="submit" name="submit" id="submit" class="form-submit btn btn-primary" value="Enregistrer"/>')
    })
})