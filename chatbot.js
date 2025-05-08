const faqData = [
    { question: "Apa itu Yok Main Super App?", answer: "Yok Main adalah sebuah platform yang membantu anda untuk menemukan komunitas berbagai olahraga di daerah anda." },
    { question: "Bagaimana cara melihat komunitas yang ada?", answer: "Kalian bisa klik 'Mau Main Bareng?' yang ada di tab atas." },
    { question: "Apakah saya bisa mendaftarkan komunitas saya?", answer: "Sangat bisa! Kamu bisa klik 'Owner Komunitas?' yang berada di tab atas lalu isi data komunitas anda." },
    { question: "Apakah bermain di komunitas gratis?", answer: "Setiap komunitas memiliki harga main yang berbeda-beda. Tetapi jika anda beruntung, anda dapat mendapatkan aktivitas gratis!" },
    { question: "Jika saya ada kesulitan dengan websitenya, dimana saya dapat bertanya?", answer: "Kalian bisa kontak kami melalui 'Kontak' yang berada di tab atas." },
];

const chatbox = document.getElementById("chatbox");
faqData.forEach((faq, index) => {
    const questionDiv = document.createElement("div");
    questionDiv.classList.add("question");
    questionDiv.innerText = faq.question;

    const answerDiv = document.createElement("div");
    answerDiv.classList.add("answer");
    answerDiv.innerText = faq.answer;
    answerDiv.style.display = "none";

    questionDiv.addEventListener("click", () => {
        if (answerDiv.style.display === "none") {
            answerDiv.style.display = "block";
        } else {
            answerDiv.style.display = "none";
        }
    });

    chatbox.appendChild(questionDiv);
    chatbox.appendChild(answerDiv);
});

function toggleChat() {
    const chatbox = document.getElementById("chatbox");
    chatbox.style.display = chatbox.style.display === "none" ? "block" : "none";
}
