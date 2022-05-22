$('.produk').select2({
    placeholder: 'Cari...',
    ajax: {
        url: '/cari_produk',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
            return {
                results: $.map(data, function (item) {
                    return {
                        text: item.nama_produk,
                        id: item.id
                    }
                })
            };
        },
        cache: true
    }
});

$('.kategori').select2({
    placeholder: 'Cari...',
    ajax: {
        url: '/cari_kategori',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
            return {
                results: $.map(data, function (item) {
                    return {
                        text: item.kategori,
                        id: item.id
                    }
                })
            };
        },
        cache: true
    }
});

$('.supplier').select2({
    placeholder: 'Cari...',
    ajax: {
        url: '/cari_supplier',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
            return {
                results: $.map(data, function (item) {
                    return {
                        text: item.nama_supplier,
                        id: item.id
                    }
                })
            };
        },
        cache: true
    }
});