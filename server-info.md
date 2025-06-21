---
layout: page
title: "Server Information"
permalink: /server-info/
---

# Server Information

## Server Details
- **Era**: Renaissance
- **Map**: Classic Britannia (Felucca only)
- **Skill Cap**: 700.0 total points
- **Stat Cap**: 225 total points
- **PvP**: Enabled everywhere outside of guardzone
- **Factions**: Classic UOR faction system

## Server Rules

### General Rules
1. No exploiting bugs or game mechanics

### PvP Rules
- All PvP combat is allowed in Felucca
- No stat loss penalties for murderers
- Faction warfare encouraged

### Housing Rules
- One house per account
- House decay

## Staff Information

### Administration
- **Owner**: [Bones]
- **Owner**: [Cad]
- **Owner**: [Sean]
- **Owner**: [Str8-N4sty]

### Contact Information
- **Discord**: [https://discord.gg/aynT7Cv82d]

## Server Statistics
- **Online Since**: January 2025
- **Current Players**: <span id="current-players">Loading...</span>
- **Peak Players**: <span id="peak-players">Loading...</span>
- **Total Items**: <span id="total-items">Loading...</span>
- **Total Mobiles**: <span id="total-mobiles">Loading...</span>
- **Server Uptime**: <span id="server-uptime">Loading...</span>
- **Last Updated**: <span id="last-updated">Loading...</span>

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

## Technical Information
- **Server Location**: [Location]
- **Uptime**: 99.9%
- **Backup Schedule**: Daily
- **Save Frequency**: Every 30 minutes

## Community Links
- **Discord**: [Link]
- **Forums**: [Link]
- **Reddit**: [Link]
- **Facebook**: [Link]