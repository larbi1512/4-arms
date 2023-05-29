// This file contains the functions for the admin dashboard

    function deliver(orders_id) {
        $.ajax({
            url: 'insert.php?action=deliver',
            type: 'POST',
            data: {
                orders_id: orders_id,
            },
            success: function(response) {
                //decrease the count of undelivered orders
                var count = parseInt($('#count').text());
                var notyf = new Notyf({
                    duration: 3000,
                    position: {
                        x: 'left',
                        y: 'top',
                    }
                });
                $('#count').text(count - 1 + ' Undelivered Orders!');

                //change the order status to delivered
                $('#order-' + orders_id).find('td:nth-child(9)').text('Delivered');
                //disable the deliver button
                $('#order-' + orders_id).find('td:nth-child(10)').find('button').prop('disabled', true);
                //disable the cancel button
                $('#order-' + orders_id).find('td:nth-child(11)').find('button').prop('disabled', true);


                notyf.success('Order marked as delivered!');

            }
        });
    }

    function cancel(orders_id) {
        $.ajax({
            url: 'insert.php?table=orders&action=delete',
            type: 'get',
            data: {
                id: orders_id,
            },
            success: function(response) {
                var notyf = new Notyf({
                    duration: 3000,
                    position: {
                        x: 'left',
                        y: 'top',
                    }
                });
                //remove the order from table
                $('#order-' + orders_id).remove();
                //decrease the count of undelivered orders
                var count = parseInt($('#count').text());
                $('#count').text(count - 1 + ' Undelivered Orders!');
            notyf.success('Order cancelled!');


            }

        });
    }
    function deleteRecord(table, id) {
        var row = $('#' + table + '-' + id);

        $.ajax({
            url: 'insert.php?action=delete&table=' + table + '&id=' + id,
            success: function(response) {
                var notyf = new Notyf({
                    duration: 3000,
                    position: {
                        x: 'left',
                        y: 'top',
                    }
                });
                // Animate the row's removal with sliding animation
                row.slideUp('fast', function() {
                    notyf.success('record deleted successfully');
                    row.remove();

                });
            }
        });
    }
