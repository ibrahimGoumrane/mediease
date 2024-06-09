<?php
    include '../model/establishConn.php';
    session_start();
    function retrieveMessages() {
        // Assuming these are already sanitized and safe to use in SQL queries
        $email = $_SESSION['email'];
        $devEmail = 'mizoxrizox@gmail.com';
    
        $conn = establishConn();
        $sql = "SELECT * FROM ContactUs WHERE email = :email or (User_mail = :email and email = :devEmail) ORDER BY created_at";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':devEmail', $devEmail);
        $stmt->execute();
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $messages;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../media/css/build.css">
    <script src="../media/js/headerJs.js" defer></script>

</head>
<body>
    <?php include 'components/header.php'; ?>
    <main class="w-full support-height  flex items-start justify-evenly shadow-green-400  ">
        <div class="w-1/6 flex justify-center items-center h-full font-serif text-base flex-col">
            <h1 class="decoration-1 underline underline-offset-2  text-3xl font-bold tracking-wider  text-left ">Express your need <br> you problems are <br> Our way to the future </h1>
            <p class=" font-serif text-wrap text-left text-xl  font-extralight text-light-green">Our support team is dedicated to providing exceptional assistance to our customers. We are available online to help you with any questions or issues you may have. Whether you are a small business, agency, or freelancer, we are here to support you every step of the way. Our team is knowledgeable, friendly, and committed to ensuring your satisfaction. Don't hesitate to reach out to us for any help you need. We are always ready to assist you.
            </p>
        </div>
        <div class="shadow-green-400 h-[95%] w-1/3 overflow-auto flex align-top  justify-center flex-col border p-5 bg-light-gray rounded-xl ">
            <div class="h-1/6">
                <h2 class=" text-black font-bold mb-3 decoration-1   text-2xl   text-left ">Our Support always here for ur help </h2>
                <p class="text-emerald-500 font-mono font-light text-sm text-left  mb-3">Online</p>
                <hr class="w-5/6  bg-light-light-black opacity-75 mb-5">
            </div>
            <div id="display-chat" class="h-4/6 overflow-auto">
                    <p class="text-left w-100 flex justify-left items-center gap-x-3 my-3" id="support"> 
                        <span id="icon" >
                        <i class='bx bx-support  bg-black rounded-full text-light-white p-2' ></i>
                        </span>
                        <span id="message" class=" bg-gray-200 rounded-md font-serif font-medium p-3">
                            hello how can i help you today ?
                        </span>
                    </p > 
                <?php 
                    $values = retrieveMessages();
                if (isset($values)) {
                    foreach ($values as $value) {
                        if ($value['email'] != $_SESSION['email'] ) {
                            echo '<p class="text-left w-100 flex justify-left items-center gap-x-3 my-3" id="support"> 
                                    <span id="icon">
                                    <i class="bx bx-support bg-black rounded-full text-light-white p-2"></i>
                                    </span>
                                    <span id="message" class="bg-gray-200 rounded-md font-serif font-medium p-3">
                                        '. $value['message'] .'
                                    </span>
                                </p>';
                        } else {
                            echo '<p class="text-right w-100 flex items-center gap-x-3 justify-end my-3" id="client"> 
                                    <span id="message" class="bg-light-green text-light-white rounded-md font-serif font-medium p-3">
                                    '. $value['message'] .'
                                    </span>
                                    <span id="icon">
                                    <i class="bx bx-user bg-light-green rounded-full text-light-white p-2"></i>
                                    </span>
                                </p>';
                        }
                    }
                }
                ?>
            </div>
            <form action="../controller/handleContactUsSubmission.php" method="post" class="w-full flex items-center justify-between gap-x-3 self-end mt-auto mx-auto ">
                <input type="text" name="Message" id="message" class="w-4/5 h-10 bg-gray-200 rounded-md p-3 border-none" placeholder="Type your message here">
                <button type="submit" class="flex items-center justify-center bg-light-green text-light-white font-thin font-serif rounded-xl p-2 w-1/4  h-10">Send</button>
            </form>
        </div>
    </main>
</body>
</html>