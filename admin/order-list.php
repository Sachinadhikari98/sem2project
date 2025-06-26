<?php


include 'db-con.php';
$query = "SELECT * FROM orders";
$stmt = mysqli_prepare($conn, $query);

mysqli_execute($stmt);
$mysqli_result = mysqli_stmt_get_result($stmt);


$datas = [];

$i = 0;
for ($i = 0; $i < mysqli_num_rows($mysqli_result); $i++) {
    $data = mysqli_fetch_assoc($mysqli_result);
    $datas[] = $data;
}
?>



<h1>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Order No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Order Item
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Customer
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone no.
                    </th>

                </tr>
            </thead>
            <tbody>
                <?php
                if (count($datas) > 0):

                    for ($j = 0; $j < count($datas); $j++):

                        $item = $datas[$j];

                ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <td class="px-6 py-4">
                                <?php echo $j + 1; ?>
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $item['order_food']; ?>
                            </th>

                            <td class="px-6 py-4">
                                <?php echo $item['customer_name']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $item['phone_no'] ?>
                            </td>

                        </tr>
                    <?php endfor;
                else: ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td colspan="3" class="text-center">NO data available</td>
                    </tr>
                <?php endif; ?>

            </tbody>
        </table>
    </div>
</h1>
<?php
