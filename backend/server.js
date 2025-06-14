const express = require('express');
const mongoose = require('mongoose');
const cors = require('cors');
const HealthCard = require('./models/HealthCard');
require('dotenv').config();

const app = express();
app.use(express.json());
app.use(cors());

// Connect to MongoDB
mongoose.connect(process.env.MONGO_URI, {
  useNewUrlParser: true,
  useUnifiedTopology: true
}).then(() => console.log('MongoDB connected'))
  .catch((err) => console.error('MongoDB connection error:', err));

// POST route to save health card data
app.post('/api/healthcard', async (req, res) => {
  try {
    const data = new HealthCard(req.body);
    await data.save();
    res.status(201).json({ message: 'Health card saved successfully' });
  } catch (err) {
    res.status(500).json({ error: 'Failed to save data' });
  }
});

const PORT = process.env.PORT || 5000;
app.listen(PORT, () => console.log(`Server running on port ${PORT}`));
