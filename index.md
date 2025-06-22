---
layout: home
title: "Welcome to UO: New Renaissance"
---

<div class="content-card">
  <h1>🏰 Welcome to UO: New Renaissance Wiki</h1>
  
  <p>Your complete guide to the premier Ultima Online freeshard experience. Whether you're a returning veteran or a new adventurer, this wiki contains everything you need to thrive in the world of UO: New Renaissance.</p>
  
  <div class="stats-grid">
    <div class="stat-card">
      <span class="stat-number" id="current-players">Loading...</span>
      <span class="stat-label">Players Online</span>
    </div>
    <div class="stat-card">
      <span class="stat-number" id="peak-players">Loading...</span>
      <span class="stat-label">Peak Today</span>
    </div>
    <div class="stat-card">
      <span class="stat-number" id="server-uptime">Loading...</span>
      <span class="stat-label">Server Uptime</span>
    </div>
    <div class="stat-card">
      <span class="server-status online">
        <span class="status-dot"></span>
        Server Status
      </span>
    </div>
  </div>
  
  <p><strong>Server IP:</strong> <code>{{ site.server_ip }}:{{ site.server_port }}</code></p>
</div>

<div class="content-card">
  <h2>🚀 Quick Start Guide</h2>
  
  <p>New to UO: New Renaissance? Start here:</p>
  
  <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 15px; margin: 20px 0;">
    <div style="text-align: center; padding: 20px; background: rgba(139, 69, 19, 0.1); border-radius: 8px; border: 1px solid var(--border-color);">
      <h3>🎮 Getting Started</h3>
      <p>Download the client, create your character, and learn the basics.</p>
      <a href="/getting-started" class="btn">Start Playing</a>
    </div>
    
    <div style="text-align: center; padding: 20px; background: rgba(139, 69, 19, 0.1); border-radius: 8px; border: 1px solid var(--border-color);">
      <h3>📚 Game Guides</h3>
      <p>Comprehensive guides for skills, crafting, and gameplay mechanics.</p>
      <a href="/game-guides" class="btn">Browse Guides</a>
    </div>
    
    <div style="text-align: center; padding: 20px; background: rgba(139, 69, 19, 0.1); border-radius: 8px; border: 1px solid var(--border-color);">
      <h3>⚔️ PvP Guide</h3>
      <p>Master player vs player combat, templates, and strategies.</p>
      <a href="/pvp-guide" class="btn">Learn PvP</a>
    </div>
  </div>
</div>

<div class="content-card">
  <h2>🌟 What Makes UO: New Renaissance Special?</h2>
  
  <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
    <div>
      <h3>⚡ Era-Accurate Gameplay</h3>
      <p>Experience Ultima Online as it was meant to be played, with Renaissance-era mechanics and balance.</p>
    </div>
    
    <div>
      <h3>🏛️ Active Community</h3>
      <p>Join a thriving community of players, guilds, and events happening daily.</p>
    </div>
    
    <div>
      <h3>🛡️ Balanced PvP</h3>
      <p>Enjoy carefully balanced player vs player combat with multiple viable templates and strategies.</p>
    </div>
    
    <div>
      <h3>🏗️ Custom Content</h3>
      <p>Discover unique quests, events, and features designed specifically for our shard.</p>
    </div>
  </div>
</div>

<div class="content-card">
  <h2>📖 Popular Wiki Pages</h2>
  
  <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 10px;">
    <a href="/skills" style="padding: 15px; background: var(--surface-color); border: 1px solid var(--border-color); border-radius: 6px; display: block; text-decoration: none;">
      <strong>🎯 Skills Guide</strong><br>
      <small>Master all 50+ skills</small>
    </a>
    
    <a href="/quests" style="padding: 15px; background: var(--surface-color); border: 1px solid var(--border-color); border-radius: 6px; display: block; text-decoration: none;">
      <strong>📜 Quests</strong><br>
      <small>Complete quest walkthroughs</small>
    </a>
    
    <a href="/housing" style="padding: 15px; background: var(--surface-color); border: 1px solid var(--border-color); border-radius: 6px; display: block; text-decoration: none;">
      <strong>🏠 Housing Guide</strong><br>
      <small>Build your dream home</small>
    </a>
    
    <a href="/events" style="padding: 15px; background: var(--surface-color); border: 1px solid var(--border-color); border-radius: 6px; display: block; text-decoration: none;">
      <strong>🎉 Events</strong><br>
      <small>Join server events</small>
    </a>
  </div>
</div>

<div class="content-card">
  <h2>💬 Community & Support</h2>
  
  <p>Need help or want to connect with other players?</p>
  
  <div style="display: flex; gap: 15px; flex-wrap: wrap; margin-top: 15px;">
    <a href="{{ site.discord_invite }}" class="btn">
      💬 Join Discord
    </a>
    <a href="{{ site.forum_url }}" class="btn btn-secondary">
      📋 Visit Forums
    </a>
    <a href="/community" class="btn btn-secondary">
      👥 Community Hub
    </a>
  </div>
</div>

<script>
// Live server stats
function updateStats() {
    fetch('/status.json')
        .then(response => response.json())
        .then(data => {
            document.getElementById('current-players').textContent = data.online_players;
            document.getElementById('peak-players').textContent = data.peak_players;
            document.getElementById('server-uptime').textContent = data.server_uptime;
            
            // Update server status indicator
            const statusElement = document.querySelector('.server-status');
            if (data.online_players > 0 || !data.error) {
                statusElement.className = 'server-status online';
                statusElement.innerHTML = '<span class="status-dot"></span>Server Online';
            } else {
                statusElement.className = 'server-status offline';
                statusElement.innerHTML = '<span class="status-dot"></span>Server Offline';
            }
        })
        .catch(error => {
            document.getElementById('current-players').textContent = '0';
            document.getElementById('peak-players').textContent = '0';
            document.getElementById('server-uptime').textContent = 'Unknown';
            
            const statusElement = document.querySelector('.server-status');
            statusElement.className = 'server-status offline';
            statusElement.innerHTML = '<span class="status-dot"></span>Server Offline';
            
            console.log('Stats fetch error:', error);
        });
}

// Update stats immediately and then every 30 seconds
updateStats();
setInterval(updateStats, 30000);
</script>