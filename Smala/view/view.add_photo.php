<form action="?upload_photo" method="post" enctype="multipart/form-data">
    <h2>Ajout d'une photo</h2>
    <label for="fileToUpload"><span></span><span></span></label>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="text" name="name_photo" placeholder="Titre de l'image" required>
    <input type="submit" value="Partager" name="submit">
</form>