<?php include "header.php"; ?>

<style>
.rating {
    direction: rtl;
    display: inline-flex;
    font-size: 30px;
}
.rating span {
    cursor: pointer;
    color: #ccc;
}
.rating span:hover,
.rating span:hover ~ span,
.rating span.active,
.rating span.active ~ span {
    color: #f5b301;
}
textarea {
    width: 100%;
    height: 100px;
    margin-top: 10px;
}
</style>

<div class="card">
    <h2>We value your feedback</h2>
    <p class="quote">
        “Our planet's alarm is going off, and it is time to wake up and take action!”
    </p>

    <form method="post">
        <!-- Star Rating -->
        <label><strong>Rate us:</strong></label><br>
        <div class="rating" id="starRating">
            <span data-value="5">★</span>
            <span data-value="4">★</span>
            <span data-value="3">★</span>
            <span data-value="2">★</span>
            <span data-value="1">★</span>
        </div>

        <!-- Hidden rating value -->
        <input type="hidden" name="rating" id="ratingValue" required>

        <!-- Message (OPTIONAL) -->
        <textarea name="msg" placeholder="Share feedback (optional)"></textarea>

        <button name="send">Submit Feedback</button>
    </form>

    <?php
    if (isset($_POST['send'])) {
        $rating = $_POST['rating'];
        $msg = $_POST['msg'] ?? '';

        $conn->query("INSERT INTO feedback (rating, message) VALUES ('$rating', '$msg')");
        echo "<p>Thank you for your feedback!</p>";
    }
    ?>
</div>

<script>
const stars = document.querySelectorAll('#starRating span');
const ratingInput = document.getElementById('ratingValue');

stars.forEach(star => {
    star.addEventListener('click', function () {
        stars.forEach(s => s.classList.remove('active'));
        this.classList.add('active');
        ratingInput.value = this.getAttribute('data-value');
    });
});
</script>

<?php include "footer.php"; ?>
