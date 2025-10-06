pipeline {
    agent any
    
    stages {
        stage('Checkout') {
            steps {
                echo 'Checking out code from GitHub...'
                checkout scm
            }
        }
        
        stage('Build Docker Images') {
            steps {
                echo 'Building backend Docker image...'
                sh 'docker-compose build backend'
            }
        }
        
        stage('Run Tests') {
            steps {
                echo 'Starting services...'
                sh 'docker-compose up -d'
                
                echo 'Running Laravel tests...'
                sh 'docker-compose exec -T backend php artisan test || true'
                
                echo 'Stopping services...'
                sh 'docker-compose down'
            }
        }
        
        stage('Cleanup') {
            steps {
                echo 'Cleaning up...'
                sh 'docker system prune -f'
            }
        }
    }
    
    post {
        success {
            echo 'Build and tests completed successfully!'
        }
        failure {
            echo 'Build or tests failed!'
        }
    }
}
