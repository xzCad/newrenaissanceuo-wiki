---
layout: page
title: "Server Information"
permalink: /server-info/
---

# Server Information

## Server Details
- **Era**: Custom Renaissance
- **Map**: Classic Britannia
- **Skill Cap**: 700 total points
- **Stat Cap**: 225 total points
- **Factions**: Classic Faction System

### General Rules
1. No exploiting bugs or game mechanics

### PvP
- No stat loss penalties for murderers
- Faction warfare encouraged

### Housing Rules
- One house per account
- House decay

## Staff Information
- **Owner**: Bones
- **Owner**: Cad
- **Owner**: Sean
- **Owner**: Str8-N4sty

<script>
function updateStats() {
    fetch('/status.json')
        .then(response => response.json())
        .then(data => {
            document.getElementById('current-players').textContent = data.online_players;
            document.getElementById('peak-players').textContent = data.peak_players;
            document.getElementById('total-items').textContent = data.total_items.toLocaleString();
            document.getElementById('total-mobiles').textContent = data.total_mobiles.toLocaleString();
            document.getElementById('server-uptime').textContent = data.server_uptime;
            document.getElementById('last-updated').textContent = data.last_updated;
        })
        .catch(error => {
            document.getElementById('current-players').textContent = 'Server Offline';
            console.log('Stats fetch error:', error);
        });
}

// Update stats immediately and then every 30 seconds
updateStats();
setInterval(updateStats, 30000);
</script>

## Updates & Patches

### Recent Changes
- [Date]: Latest patch notes
- [Date]: Previous updates
- [Date]: Bug fixes and improvements

### Planned Features
- Upcoming events
- System improvements
- New content additions

## Community Links
- **Discord**: [\[Link\]](https://discord.gg/aynT7Cv82d)