
<footer>
    <p>copyright</p>
    <?php if(isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
        echo "<p><form action='adminOut.php' method='post'>
        <submit type='submit' name='logoutButton' value='sign out admin'>
        </form></p>";
    }?>
    <p><a href="admin/add_prints.php">add prints</a></p>
</footer>

</body>
</html>