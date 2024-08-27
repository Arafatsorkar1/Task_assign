
<script type="text/javascript" src="{{asset('/')}}assets/scripts/main.d810cf0ae7f39f28f336.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script src="{{asset('assets/js/axios.min.js')}}"></script>

<script>
    function confirmDelete(userId) {
        var confirmation = confirm("Are you sure you want to delete this user?");
        if (confirmation) {
            document.getElementById('confirmDelete' + userId).submit();
        } else {

        }
    }
    function confirmArchive(userId) {
        var confirmation = confirm("Are you sure you want to Archive this user?");
        if (confirmation) {
            document.getElementById('confirmArchive' + userId).submit();
        } else {

        }
    }
    function confirmReturn(userId) {
        var confirmation = confirm("Are you sure you want to Restore this user?");
        if (confirmation) {
            document.getElementById('confirmReturn' + userId).submit();
        } else {

        }
    }
</script>
