// document.addEventListener('DOMContentLoaded', function () {
//     document.getElementById('leadForm').addEventListener('submit', function (e) {
//         e.preventDefault();

//         var formData = new FormData(this);
//         fetch("{{ route('home.lead', ['locale' => app()->getLocale()]) }}", {
//             method: 'POST',
//             headers: {
//                 'X-Requested-With': 'XMLHttpRequest',
//                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//             },
//             body: formData
//         })
//         .then(response => response.json())
//         .then(data => {
//             if (data.message) {
//                 // Bu yerda modalni ko'rsatish
//                 $('#myModal_2').modal('show');
//             }
//         })
//         .catch(error => console.error('Xatolik:', error));
//     });
// });
