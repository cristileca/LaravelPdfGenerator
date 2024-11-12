<form action="/generate-resume" method="GET">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br>

    <label for="phone">Phone:</label>
    <input type="text" name="phone" id="phone" required><br>

    <label for="experience">Experience:</label>
    <textarea name="experience" id="experience" required></textarea><br>

    <label for="skills">Skills:</label>
    <textarea name="skills" id="skills" required></textarea><br>

    <label for="education">Education:</label>
    <textarea name="education" id="education" required></textarea><br>

    <label for="position">Position:</label>
    <textarea name="position" id="position" required></textarea><br>

    <label for="code">Code:</label>
    <textarea name="code" id="code" required></textarea><br>

    <button type="submit">Generate Resume</button>
</form>
