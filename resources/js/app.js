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
            var reloadButton = document.querySelector('button[title="Reload"]');
            reloadButton.click();
        }).catch((err) => {
            alert("Gagal Menghapus Data")
        });
    } else {
        alert('Data Tidak Dihapus, Tidak Ada Perubahan');
    }
});

$('body').on('click', '.btn-order', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href');

    if(confirm('Apakah anda yakin ingin memperbarui status data ini?')) {
        axios.put(url, {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        }).then((res) => {
            // reload table after success deleted
            var reloadButton = document.querySelector('button[title="Reload"]');
            reloadButton.click();

        }).catch((err) => {
            alert("Gagal Memperbarui Status Data")
        });
    } else {
        alert('Data Tidak Di Update, Tidak Ada Perubahan');
    }
});


