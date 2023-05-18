
const joinBtn = document.querySelector(".login");
const container = document.querySelector(".container");

joinBtn.addEventListener("click", addModal);

function addModal() {
  let modal = document.createElement("div");
  modal.classList.add("modal");
  modal.innerHTML += `
    <div class="change-function">
      <button class="switch active">Sign In<span></span></button>
      <button class="switch">Sign Up<span></span></button>
      <button class="close">X</button>
    </div>
    <div class="function"></div>
  `;
  let overlay = document.createElement("div");
  overlay.setAttribute("class", "overlay");

  // Add the modal and overlay to the page
  container.appendChild(modal);
  container.appendChild(overlay);

  // Add event listener to the close button
  let closeBtn = modal.querySelector(".close");
  closeBtn.addEventListener("click", () => {
    // Remove the modal and overlay from the page
    container.removeChild(modal);
    container.removeChild(overlay);
  });

  container.appendChild(modal);

  const switchers = modal.querySelectorAll(".switch");
  const contentDiv = modal.querySelector(".function");
  contentDiv.innerHTML = getContentForModal("Sign In");
  switchers.forEach((switcher) => {
    switcher.addEventListener("click", () => {
      switchers.forEach((s) => s.classList.toggle("active", s === switcher));

      const modalType = switcher.textContent.trim();
      const content = getContentForModal(modalType);
      contentDiv.innerHTML = content;
    });
  });
}

function getContentForModal(modalType) {
  // Return the content for the specified modal type
  if (modalType === "Sign In") {
    return `
    <div class="intro-signin">
    <p>
      Welcome to <br />
      <span class="sub-color">MAKEIT</span>Men.
    </p>
    <p>
      Welcome to <br />
      <span class="sub-color">MAKEIT</span>Men.
    </p>
  </div>
  <div class="form-signin">
    <form id="login-form" action="" method="post">
      <label>
        <input type="text" placeholder="Username" required name="id">
      </label>
      <label>
        <input type="password" placeholder="Password" required minlength="5" name="pass">
      </label>
      <input type="submit" value="Sign In" name="sm-si">
    </form>
  </div>
    `;
  } else if (modalType === "Sign Up") {
    return `
    <div class="form-signup">
    <form action="" method="post">
      <label class="information">
        <input type="text" placeholder="Full Name" required name="fullname">
        <input type="text" placeholder="Phone" required name="phone">
        <input type="email" placeholder="Email" required name="email">
      </label>
      <label class="address">
        <input type="text" placeholder="Street" required name="st">
        <input type="text" placeholder="Dist" required name="di">
        <input type="text" placeholder="City" required name="ct">
      </label>
      <label class="account">
        <input type="text" placeholder="Username" required name="username">
        <input type="password" placeholder="Password" required minlength="5" name="pass">
      </label>
      <label for="">
        <input type="password" placeholder="Re-password" required>
      </label>
      <input type="submit" value="Sign Up" name="sm-su">
    </form>
  </div>
  <div class="intro-signup">
    <p>Being a member of<br> <span class="sub-color">MAKEIT</span>Men. to explore <br> your own fashion.</p>
  </div>
    `;
  }
}
