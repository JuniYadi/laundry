import './bootstrap';
import 'laravel-datatables-vite';
import axios from 'axios';

// Form Delete Data
$('body').on('click', '.btn-delete', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href');

    if(confirm('Apakah anda yakin ingin menghapus data ini?')) {
        axios.delete(url, {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        }).then((res) => {
            // reload table after success deleted
            $('.buttons-reload').click()
        }).catch((err) => {
            alert("Gagal Menghapus Data")
        });
    } else {
        alert('Data Tidak Dihapus, Tidak Ada Perubahan');
    }
});


