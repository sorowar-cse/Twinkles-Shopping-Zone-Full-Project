const express = require('express')
const { MongoClient } = require('mongodb')
const ObjectId = require('mongodb').ObjectId
const cors = require('cors')
const app = express()
const port = 5000
// middle ware
app.use(cors())
app.use(express.json())
// Traveling-app-fifth
// mJpFypko0n6xvgzy
const uri = "mongodb+srv://shopping:shopping123@cluster0.6wtrm1x.mongodb.net/?retryWrites=true&w=majority";
//const uri ='mongodb+srv://Traveling-app-fifth:mJpFypko0n6xvgzy@cluster0.9s2cu.mongodb.net/?retryWrites=true&w=majority'
const client = new MongoClient(uri, {
    useNewUrlParser: true,
    useUnifiedTopology: true,
})

async function run() {
    try {
        await client.connect()
        const database = client.db('shopping')
        const serviceCollection = database.collection('users')
        console.log('database connected')
        // send services to the database
        app.post('/register', async (req, res) => {
            const service = req.body
            const result = await serviceCollection.insertOne(service)
            console.log(result)
            res.json(result)
        })

        // update data into products collection
        // app.put('/services/:id([0-9a-fA-F]{24})', async (req, res) => {
        //   const id = req.params.id.trim()
        //   console.log('updating', id)
        //   const updatedService = req.body
        //   const filter = { _id: new ObjectId(id) }
        //   const options = { upsert: true }
        //   const updateDoc = {
        //     $set: {
        //       name: updatedService.name,
        //       price: updatedService.price,
        //       duration: updatedService.duration,
        //       img: updatedService.img,
        //     },
        //   }
        //   const result = await serviceCollection.updateOne(
        //     filter,
        //     updateDoc,
        //     options,
        //   )
        //   console.log('updating', id)
        //   res.json(result)
        // })

        // get all services
        // app.get('/services', async (req, res) => {
        //   const cursor = serviceCollection.find({})
        //   const service = await cursor.toArray()
        //   res.send(service)
        // })

        // get a single service from service collection
        // app.get('/services/:id([0-9a-fA-F]{24})', async (req, res) => {
        //   const id = req.params.id.trim()
        //   const query = { _id: ObjectId(id) }
        //   const service = await serviceCollection.findOne(query)
        //   res.json(service)
        // })

        // delete a data from service collection
        // app.delete('/services/:id([0-9a-fA-F]{24})', async (req, res) => {
        //   const id = req.params.id.trim()
        //   const query = { _id: new ObjectId(id) }
        //   const result = await serviceCollection.deleteOne(query)
        //   res.json('result')
        // })
    } finally {
    }
}
run().catch(console.dir)

app.get('/', (req, res) => {
    res.send('Running App')
})

app.listen(port, () => {
    console.log(`Its Working ${port}`)
})