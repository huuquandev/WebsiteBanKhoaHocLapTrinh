<?php
include('../../../components/connect.php');
// Retrieve the ID of the course to be deleted from POST data
$id = $_GET['idHL'];

// Perform the database query to delete the course by ID
$sql = "DELETE FROM tb_hoc_lieu WHERE id_hoclieu =  '$id'";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
  echo '<script>alert("Xóa thành công"); window.location.href = "../../cms_dashboard.php?title=cms_courses";</script>';
} else {
  echo '<script>alert("Xóa không thành công"); window.location.href = "../../cms_dashboard.php?title=cms_courses";</script>';
}
?>