<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
<script>
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        const titleText = $(this).attr('title');
        const dataText = $(this).attr('data');

        Swal.fire({
            title: titleText,
            text: dataText,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet!',
            cancelButtonText:'Hayır'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url
            }
        })
    }) </script>
