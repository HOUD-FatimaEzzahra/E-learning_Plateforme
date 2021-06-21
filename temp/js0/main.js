function addCours() {
  if (document.getElementById("titre").value == "") {
    swal("Erreur", "Entrer le titre SVP!", "warning");
    return false;
  }
  if (document.getElementById("description").value == "") {
    swal("Erreur", "Entrer la description SVP!", "warning");
    return false;
  }
}
function updateCours() {
  if (document.getElementById("cours").value == "") {
    swal("Erreur", "Choisir le cours SVP!", "warning");
    return false;
  }
  if (document.getElementById("description").value == "") {
    swal("Erreur", "Entrer la description SVP!", "warning");
    return false;
  }
}
function deleteCours() {
  if (document.getElementById("cours").value == "") {
    swal("Erreur", "Choisir le cours SVP!", "warning");
    return false;
  }
}
function addChapitre() {
  if (document.getElementById("cours").value == "") {
    swal("Erreur", "Choisir le cours SVP!", "warning");
    return false;
  }
  if (document.getElementById("titre").value == "") {
    swal("Erreur", "Entrer le titre SVP!", "warning");
    return false;
  }
  if (document.getElementById("description").value == "") {
    swal("Erreur", "Entrer la description SVP!", "warning");
    return false;
  }
  if (document.getElementById("summernote").value == "") {
    swal("Erreur", "Entrer le contenu SVP!", "warning");
    return false;
  }
}
function updateChapitre() {
  if (document.getElementById("cours").value == "") {
    swal("Erreur", "Choisir le cours SVP!", "warning");
    return false;
  }
  if (document.getElementById("chapitre").value == "") {
    swal("Erreur", "Choisir le chapitre SVP!", "warning");
    return false;
  }
  if (document.getElementById("description").value == "") {
    swal("Erreur", "Entrer la description SVP!", "warning");
    return false;
  }
  if (document.getElementById("summernote").value == "") {
    swal("Erreur", "Entrer le contenu SVP!", "warning");
    return false;
  }
}
function deleteChapitre() {
  if (document.getElementById("cours").value == "") {
    swal("Erreur", "Choisir le cours SVP!", "warning");
    return false;
  }
  if (document.getElementById("chapitre").value == "") {
    swal("Erreur", "Choisir le chapitre SVP!", "warning");
    return false;
  }
}
function addExercice() {
  if (document.getElementById("cours").value == "") {
    swal("Erreur", "Choisir le cours SVP!", "warning");
    return false;
  }
  if (document.getElementById("chapitre").value == "") {
    swal("Erreur", "Choisir le chapitre SVP!", "warning");
    return false;
  }
  if (document.getElementById("titre").value == "") {
    swal("Erreur", "Entrer le titre SVP!", "warning");
    return false;
  }
  if (document.getElementById("description").value == "") {
    swal("Erreur", "Entrer la description SVP!", "warning");
    return false;
  }
  if (document.getElementById("summernote").value == "") {
    swal("Erreur", "Entrer le contenu SVP!", "warning");
    return false;
  }
}
function updateExercice() {
  if (document.getElementById("cours").value == "") {
    swal("Erreur", "Choisir le cours SVP!", "warning");
    return false;
  }
  if (document.getElementById("chapitre").value == "") {
    swal("Erreur", "Choisir le chapitre SVP!", "warning");
    return false;
  }
  if (document.getElementById("exercice").value == "") {
    swal("Erreur", "Choisir l'exercice SVP!", "warning");
    return false;
  }
  if (document.getElementById("description").value == "") {
    swal("Erreur", "Entrer la description SVP!", "warning");
    return false;
  }
  if (document.getElementById("summernote").value == "") {
    swal("Erreur", "Entrer le contenu SVP!", "warning");
    return false;
  }
}
function deleteExercice() {
  if (document.getElementById("cours").value == "") {
    swal("Erreur", "Choisir le cours SVP!", "warning");
    return false;
  }
  if (document.getElementById("chapitre").value == "") {
    swal("Erreur", "Choisir le chapitre SVP!", "warning");
    return false;
  }
  if (document.getElementById("exercice").value == "") {
    swal("Erreur", "Choisir l'exercice SVP!", "warning");
    return false;
  }
}
function addCorrection() {
  if (document.getElementById("exercice").value == "") {
    swal("Erreur", "Choisir le exercice SVP!", "warning");
    return false;
  }
  if (document.getElementById("titre").value == "") {
    swal("Erreur", "Entrer le titre SVP!", "warning");
    return false;
  }
  if (document.getElementById("summernote").value == "") {
    swal("Erreur", "Entrer le contenu SVP!", "warning");
    return false;
  }
}
function updateCorrection() {
  if (document.getElementById("correction").value == "") {
    swal("Erreur", "Choisir la correction SVP!", "warning");
    return false;
  }
  if (document.getElementById("summernote").value == "") {
    swal("Erreur", "Entrer le contenu SVP!", "warning");
    return false;
  }
}
function deleteCorrection() {
  if (document.getElementById("correction").value == "") {
    swal("Erreur", "Choisir la correction SVP!", "warning");
    return false;
  }
}
