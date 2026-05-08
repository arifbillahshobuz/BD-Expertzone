
const fs = require('fs');
const path = 'C:/Users/Arif/.gemini/antigravity/brain/94a93182-860f-4788-9999-7f33f011f8d4/.system_generated/logs/overview.txt';

const lines = fs.readFileSync(path, 'utf8').split('\n');
for (let line of lines) {
    if (!line) continue;
    try {
        const data = JSON.parse(line);
        if (data.step_index === 28) {
            const call = data.tool_calls.find(c => c.name === 'replace_file_content');
            if (call) {
                fs.writeFileSync('f:/BD-Expertzone/scratch/original_header.blade.php', call.args.TargetContent);
                console.log('Extracted!');
                process.exit(0);
            }
        }
    } catch (e) { }
}
