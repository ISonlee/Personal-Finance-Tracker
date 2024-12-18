<?php
require_once 'backend/check_session.php';
// Now only logged-in users can access this page
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="">
    <link rel="stylesheet" href="Financia CSS/Financia_Dashboard_Overview_Css.css">
    <title>Financia - Dashboard</title>
    <style>
        @media screen and (max-width: 1920px) and (max-height: 1080px) {
            body {
                background-image: url(Financia_Dashboard_Overview_Images/Dashboard\ Overview\ Background.png), url(Financia_Dashboard_Overview_Images/Dashboard\ Overview\ Background\ 2.png);
                background-color: rgb(199, 163, 245);
                background-repeat: no-repeat;
                background-position-y: top, center;
                background-size: 1920px 800px, 1920px 1040px;
                width: 95;
            }
        }

        @font-face

        /*This will be served as font style for our website*/
            {
            font-family: Roboto1;
            src: url(Financia_Fonts/roboto/Roboto-Light.ttf);
        }

        @font-face

        /*This will be served as font style for our website*/
            {
            font-family: Roboto2;
            src: url(Financia_Fonts/roboto/Roboto-Bold.ttf);
        }

        @font-face

        /*This will be served as font style for our website*/
            {
            font-family: Roboto3;
            src: url(Financia_Fonts/roboto/Roboto-Black.ttf);
        }

        @font-face {
            font-family: Coolvetica1;
            src: url(Financia_Fonts/coolvetica/coolvetica\ condensed\ rg.otf);
        }

        @font-face {
            font-family: Coolvetica2;
            src: url(Financia_Fonts/coolvetica/coolvetica\ rg.otf);
        }
    </style>
</head>

<body>
    <table class="table1">
        <tr>
            <td class="Financia_box"><a class="Financia" href="Financia.php">Financia</a></td>
            <td style="width: 50vw;"></td>
            <td class="e-pay_box">
                <img class="e-pay_button" id="epayBtn" src="Financia_Home_Page_Images/plus.png" alt="">
                <div class="dropdown-menu" id="dropdownMenuEpay">
                    <a href="Financia-E-Pay.php">E-Pay</a>
                </div>
            </td>

            <td class="notification_box"><img class="notification_button"
                    src="Financia_Home_Page_Images/Notification bell.png" alt=""></td>
            <td class="account_box">
                <img class="account" id="accountBtn" src="Financia_Home_Page_Images/Account profile.png" alt="">
                <div class="dropdown-menu" id="dropdownMenuAccount">
                    <a href="Financia_Sign_In.html">Sign In</a>
                    <a href="Financia_Sign_Up.php">Sign Up</a>
                    <a href="Financia_Account.php">Account</a>

                </div>
            </td>
            <td class="settings_box"><img class="settings_button" src="Financia_Home_Page_Images/Settings logo.png"
                    alt=""></td>
        </tr>
    </table>
    <table class="table2">
        <form action="">
            <tr>
                <td class="td_link">
                    <a class="nav_link" href="Financia_Dashboard_Overview.php">Overview</a>
                </td>
                <td class="td_link">
                    <a class="nav_link" href="Financia_Dashboard_Summary.html">Summary</a>
                </td>
                <td class="td_link">
                    <a class="nav_link" href="Financia_History.php">History</a>
                </td>
                <td class="td_link">
                    <a class="nav_link" href="Financia_Transactions.html">Transactions</a>
                </td>
                <td class="td_link">
                    <a class="nav_link" href="#">Reports</a>
                </td>
            </tr>
        </form>
    </table>

    <!-- Balance Overview Section -->
    <section class="balance-overview">
        <h2>Balance Overview</h2>
        <div class="overview-container">
            <div class="chart">
                <button class="chart-btn">Line Chart</button>
                <button class="chart-btn">Year</button>
                <img src="line-chart-placeholder.png" alt="Line Chart">
                <p>Overall Assets: ₱3,345,000<br>Overall Liabilities: ₱1,235,000<br>Overall Net Worth: ₱2,110,000</p>
            </div>
            <div class="overview-table">
                <div class="date-range">
                    <input type="text" placeholder="Start Month & Year">
                    <input type="text" placeholder="End Month & Year">
                </div>
                <table>
                    <tr>
                        <th>Assets</th>
                        <th>Liabilities</th>
                        <th>Net Worth</th>
                        <th>Month</th>
                    </tr>
                    <tr>
                        <td>₱50,000</td>
                        <td>₱10,000</td>
                        <td>₱40,000</td>
                        <td>January</td>
                    </tr>
                    <tr>
                        <td>₱100,000</td>
                        <td>₱30,000</td>
                        <td>₱70,000</td>
                        <td>February</td>
                    </tr>
                    <tr>
                        <td>₱200,000</td>
                        <td>₱150,000</td>
                        <td>₱70,000</td>
                        <td>March</td>
                    </tr>
                    <tr>
                        <td>₱500,000</td>
                        <td>₱100,000</td>
                        <td>₱400,000</td>
                        <td>April</td>
                    </tr>
                    <tr>
                        <td>₱300,000</td>
                        <td>₱250,000</td>
                        <td>₱50,000</td>
                        <td>May</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>

    <!-- Income & Expenses Section -->
    <section class="income-expenses">
        <h2>Income & Expenses</h2>
        <div class="expenses-container">
            <div class="chart">
                <button class="chart-btn">Pie Chart</button>
                <button class="chart-btn">Month</button>
                <img src="pie-chart-placeholder.png" alt="Pie Chart">
                <p>Overall Income: ₱8200<br>Overall Expenses: ₱4500<br>Overall Profit: ₱3700</p>
            </div>
            <div class="expenses-table">
                <div class="date-range">
                    <input type="text" placeholder="Start Date">
                    <input type="text" placeholder="End Date">
                </div>
                <table>
                    <tr>
                        <th>Income</th>
                        <th>Expenses</th>
                        <th>Profit</th>
                        <th>Date</th>
                    </tr>
                    <tr>
                        <td>₱1500</td>
                        <td>₱800</td>
                        <td>₱700</td>
                        <td>2024-10-01</td>
                    </tr>
                    <tr>
                        <td>₱2000</td>
                        <td>₱1200</td>
                        <td>₱800</td>
                        <td>2024-10-02</td>
                    </tr>
                    <tr>
                        <td>₱1800</td>
                        <td>₱1000</td>
                        <td>₱800</td>
                        <td>2024-10-03</td>
                    </tr>
                    <tr>
                        <td>₱1200</td>
                        <td>₱600</td>
                        <td>₱600</td>
                        <td>2024-10-04</td>
                    </tr>
                    <tr>
                        <td>₱1700</td>
                        <td>₱900</td>
                        <td>₱800</td>
                        <td>2024-10-05</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>

    <!-- Transaction History Section -->
    <section class="transaction-history">
        <h2>Transaction History</h2>
        <div class="history-container">
            <div class="date-range">
                <select>
                    <option>Select Transaction Type</option>
                </select>
                <input type="text" placeholder="Start Date">
                <input type="text" placeholder="End Date">
            </div>
            <table>
                <tr>
                    <th>Transaction Description</th>
                    <th>Amount</th>
                    <th>Time</th>
                    <th>Date</th>
                </tr>
                <tr>
                    <td>Salary (Income)</td>
                    <td>₱1500</td>
                    <td>09:30 am</td>
                    <td>2024-10-01</td>
                </tr>
                <tr>
                    <td>Groceries (Expense)</td>
                    <td>₱120</td>
                    <td>1:45 pm</td>
                    <td>2024-10-02</td>
                </tr>
                <tr>
                    <td>Savings Deposit</td>
                    <td>₱300</td>
                    <td>11:00 am</td>
                    <td>2024-10-03</td>
                </tr>
                <tr>
                    <td>Dining Out (Expense)</td>
                    <td>₱60</td>
                    <td>4:30 pm</td>
                    <td>2024-10-04</td>
                </tr>
                <tr>
                    <td>Investment Return (Income)</td>
                    <td>₱200</td>
                    <td>5:30 am</td>
                    <td>2024-10-05</td>
                </tr>
            </table>
        </div>
    </section>
    <div>
        <hr style="margin: 12vw 0 0 -1vw; border: 0.1vw solid black; width: 38vw;">
        <hr style="width: 9vw; border: 0.1vw solid black; margin: -0.2vw 0 0 40vw;">
        <hr style="width: 3vw; border: 0.1vw solid black; margin: -0.2vw 0 0 52vw;">
        <hr style="width: 39.2vw; border: 0.1vw solid black; margin: -0.2vw 0 0 58vw;">
    </div>
    <div class="div6">
        <img class="social_media_logo" src="Financia_Home_Page_Images/facebook.png" alt="">
        <img class="social_media_logo" src="Financia_Home_Page_Images/twitter.png" alt="">
        <img class="social_media_logo" src="Financia_Home_Page_Images/tiktok.png" alt="">
        <img class="social_media_logo" src="Financia_Home_Page_Images/instagram.png" alt="">
    </div>
    <table class="table5">
        <tr>
            <td class="footer_link_box"><a class="footer_links" href="Financia-AboutUs-html">About Us</a></td>
            <td class="footer_link_box"><a class="footer_links" href="">Terms & Conditions</a></td>
            <td class="footer_link_box"><a class="footer_links" href="">Privacy Policy</a></td>
            <td class="footer_link_box"><a class="footer_links" href="">Contact Us</a></td>
        </tr>
    </table>
    <br>
    <hr style="border: 0.1vw solid black; width: 99.2vw; margin: 0 -1vw 0 -1vw;">
    <p class="copyright">&copy; 2024 Financia. All Rights Reserved.</p>

    <script>
        // E-Pay Dropdown
        const epayBtn = document.getElementById('epayBtn');
        const dropdownMenuEpay = document.getElementById('dropdownMenuEpay');

        // Account Dropdown
        const accountBtn = document.getElementById('accountBtn');
        const dropdownMenuAccount = document.getElementById('dropdownMenuAccount');

        // Toggle visibility of E-Pay dropdown
        epayBtn.addEventListener('click', (event) => {
            event.stopPropagation(); // Prevent click from bubbling up
            dropdownMenuEpay.style.display =
                dropdownMenuEpay.style.display === 'block' ? 'none' : 'block';
            dropdownMenuAccount.style.display = 'none'; // Close other dropdown
        });

        // Toggle visibility of Account dropdown
        accountBtn.addEventListener('click', (event) => {
            event.stopPropagation(); // Prevent click from bubbling up
            dropdownMenuAccount.style.display =
                dropdownMenuAccount.style.display === 'block' ? 'none' : 'block';
            dropdownMenuEpay.style.display = 'none'; // Close other dropdown
        });

        // Close dropdowns when clicking outside
        window.addEventListener('click', () => {
            dropdownMenuEpay.style.display = 'none';
            dropdownMenuAccount.style.display = 'none';
        });
    </script>

</body>

</html>