/*
    SCRIPT JS
*/

document.addEventListener("DOMContentLoaded", () => {
    // Confirmation avant suppression (liens contenant 'supprimer')
    document.querySelectorAll("a[href*='supprimer']").forEach(link => {
        link.addEventListener("click", e => {
            if (!confirm("Voulez-vous vraiment supprimer cette tâche ?")) {
                e.preventDefault();
            }
        });
    });

    // Soumission de formulaire : feedback utilisateur (évite double clic)
    document.querySelectorAll("form").forEach(form => {
        form.addEventListener("submit", () => {
            const button = form.querySelector("button, input[type='submit']");
            if (button) {
                button.disabled = true;
                button.textContent = "Traitement...";
                button.style.opacity = "0.6";
            }
        });
    });

    // Affichage / Masquage des mots de passe
    document.querySelectorAll("input[type='password']").forEach(input => {
        const wrapper = document.createElement("div");
        wrapper.style.position = "relative";
        input.parentNode.insertBefore(wrapper, input);
        wrapper.appendChild(input);

        const toggle = document.createElement("span");
        toggle.textContent = "👁";
        toggle.style.position = "absolute";
        toggle.style.right = "10px";
        toggle.style.top = "50%";
        toggle.style.transform = "translateY(-50%)";
        toggle.style.cursor = "pointer";
        toggle.title = "Afficher / Masquer";
        wrapper.appendChild(toggle);

        toggle.addEventListener("click", () => {
            input.type = input.type === "password" ? "text" : "password";
            toggle.textContent = input.type === "password" ? "👁" : "🙈";
        });
    });

    // Ajout dynamique de l'heure locale dans le footer (profil ou accueil)
    const footer = document.querySelector("footer");
    if (footer) {
        const clock = document.createElement("div");
        clock.style.fontSize = "0.85rem";
        clock.style.marginTop = "0.5rem";
        clock.style.opacity = "0.8";
        footer.appendChild(clock);

        const updateClock = () => {
            const now = new Date();
            clock.textContent = "Heure locale : " + now.toLocaleTimeString();
        };
        updateClock();
        setInterval(updateClock, 1000);
    }
});